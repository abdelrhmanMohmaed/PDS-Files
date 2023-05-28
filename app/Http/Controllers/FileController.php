<?php

namespace App\Http\Controllers;

use App\Events\FileAdded;
use App\Http\Requests\FileRequest;
use App\Models\Machine;
use App\Models\Part;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function showfile(Part $part, $modelName)
    {
        $model = selectModel($modelName);
        $files = $model->wherePartId($part->id)->latest('id')->paginate(10);
        $machines = Machine::get();

        return view('web.files.show_file', compact(['files', 'modelName', 'machines']));
    }

    public function store(Part $part, $modelName, FileRequest $request)
    {
        if ($request->file('file')) {
            $path = 'files/' . $modelName . '/';
            $filePath = uploadImage($path, $request->file);
        }

        $model = selectModel($modelName);
        $week = Carbon::now()->weekOfYear;

        try {
            $model->file = $filePath;
            $model->user_id = Auth::user()->id;
            $model->part_id = $part->id;

            // check a machine_id added or no 
            if ($request->machine_id) {
                $request->validate([
                    'machine_id' => 'required|exists:machines,id',
                ]);
                $model->machine_id = $request->machine_id;
            }

            $model->week = $week;
            $model->save();

            event(new FileAdded($model, $modelName));
            $request->session()->flash('success', 'New file added successfully');

            return redirect()->route("get.show", [$part->id]);
        } catch (Exception $e) {
            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return redirect()->route("get.show", [$part->id]);
        }
        return redirect()->route("get.show", [$part->id]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'machine' => 'required|exists:machines,id',
        ]);

        $model = selectModel($request->name); 
        
        $model->whereId($request->id)->update([
            'machine_id' => $request->machine
        ]);

        $request->session()->flash('success', 'Updated successfully');
        return back();
    }

    public function download($id, $modelName, Request $request)
    {
        $model = selectModel($modelName);
        $file = $model->findOrFail($id); 

        $path = "files/" . $modelName . '/' . $file->file;

        try {
            return Storage::download($path, substr($file->file, 11));
        } catch (Exception $e) {

            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
        return back();
    }

    public function delete(Request $request)
    {
        $model = selectModel($request->name);
        $file = $model->findOrFail($request->file_id); 

        $path = "files/" . $request->name . '/' . $file->file;

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
}
