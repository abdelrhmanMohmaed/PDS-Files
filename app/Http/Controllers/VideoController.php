<?php

namespace App\Http\Controllers;

use App\Events\FileAdded;
use App\Models\Part;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{

    public function show(Part $part, $modelName)
    {
        $model = selectModel($modelName);
        if (in_array(Auth::user()->role_id, [1, 2]))
            $files = $model->wherePartId($part->id)->latest('id')->paginate(10);
        else
            $files = $model->where('part_id', $part->id)->with(['part'])->latest('id')->first();

        return view('web.files.show_video', compact(['files', 'modelName']));
    }

    public function store(Part $part, $modelName, Request $request)
    {
        $request->validate([
            'title' => 'required|',
            'video' => 'required|',
        ]);

        if ($request->file('video')) {
            $path = 'videos/' . $modelName . '/';
            $filePath = uploadImage($path, $request->video);
        }

        $model = selectModel($modelName);
        $week = Carbon::now()->weekOfYear;

        try {
            $model->file = $filePath;
            $model->title = $request->title;
            $model->week =  $week;
            $model->user_id = Auth::user()->id;
            $model->part_id = $part->id;
            $model->save();

            event(new FileAdded($model, $modelName));
            $request->session()->flash('success', 'New file added successfully');

            return back();
        } catch (Exception $e) {
            // return $e;
            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
        return  back();
    }

    public function download($id, $modelName, Request $request)
    {
        $model = selectModel($modelName);
        $file = $model->findOrFail($id);

        $path = "videos/" . $modelName . '/' . $file->file;

        try {
            return Storage::download($path, substr($file->file, 11));
        } catch (Exception $e) {

            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:videos,title',
        ]);

        $model = selectModel($request->name);
        $model->whereId($request->file_id)->update(['title' => $request->title]);

        $request->session()->flash('success', 'Title updated successfully');
        return back();
    }

    public function delete(Request $request)
    {
        $model = selectModel($request->name);
        $file = $model->findOrFail($request->file_id);

        $path = "videos/" . $request->name . '/' . $file->file;

        try {
            Storage::delete($path, substr($file->file, 11));
            $file->delete();

            $request->session()->flash('success', 'File deleted successfully');

            return back();
        } catch (Exception $e) {

            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
        return back();
    }

    public function watch($id, $modelName)
    {
        $model = selectModel($modelName);
        $file = $model->findOrFail($id);

        return view('web.files.watch', compact('file'));
    }
}
