<?php

namespace App\Http\Controllers;

use App\Events\FileAdded;
use App\Models\Training;
use App\Models\TrainingVideo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::get();
        return view('training.index', compact('trainings'));
    }

    public function show()
    {
        $trainings = Training::get();
        return view('training.show', compact('trainings'));
    }

    public function view($trainingId)
    {
        $trainings = TrainingVideo::with(['user'])->where('training_id', $trainingId)->orderBy('id', 'DESC')->paginate(10);
        if (!$trainings) return redirect()->back()->with('wrong', 'Sorry, Something is wrong please try again!!');
        $modelName = 'TrainingVideo';
        return view('training.view', compact('trainings', 'modelName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'training_name' => 'required|string|unique:trainings,name',
        ]);

        try {
            Training::create([
                'name' => $request->training_name,
            ]);
            $request->session()->flash('success', 'New Training added successfully (' . $request->training_name . ')');
            return back();
        } catch (\Exception $e) {
            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
    }

    public function store_training_video(Request $request, $modelName)
    {
        $request->validate([
            'video' => 'required|',
            'training' => 'required|',
        ]);

        $training = Training::where('id', $request->training)->first();
        if (!$training) return redirect()->back()->with('wrong', 'Sorry, Something is wrong please try again!!');


        if ($request->file('video')) {
            $path = 'videos/' . $modelName . '/';
            $filePath = uploadImage($path, $request->video);
        }

        $model = selectModel($modelName);
        try {
            $model->file = $filePath;
            $model->user_id = Auth::user()->id;
            $model->training_id = $training->id;
            $model->save();

            event(new FileAdded($model, $modelName));
            $request->session()->flash('success', 'New training added successfully');

            return back();
        } catch (Exception $e) {

            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
    }

    public function update(Request $request)
    {
        $training = Training::where('id', $request->id)->first();
        if (!$training) return redirect()->back()->with('wrong', 'Sorry, Something is wrong please try again!!');

        try {
            $training->update([
                'name' => $request->name,
            ]);
            $request->session()->flash('success', 'The Training Updated successfully (' . $request->name . ')');
            return back();
        } catch (Exception $e) {

            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
    }

    public function delete_training(Request $request)
    {

        $training = Training::where('id', $request->id)->first();
        if (!$training) return redirect()->back()->with('wrong', 'Sorry, Something is wrong please try again!!');

        try {
            if ($training->training_video->count() > 0) {
                foreach ($training->training_video as $key) {
                    $path = "videos/TrainingVideo/" . $key->file;
                    Storage::delete($path);
                }
            }

            $training->training_video()->delete();
            $training->delete();

            $request->session()->flash('success', 'Training deleted successfully');

            return back();
        } catch (Exception $e) {

            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
    }
}
