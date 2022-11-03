<?php

namespace App\Http\Controllers;

use App\Events\FileAdded;
use App\Http\Requests\FileRequest;
use App\Models\Part;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function showfile(Part $part, $modelName)
    {
        $model = selectModel($modelName);

        if (in_array(Auth::user()->role_id, [1, 2])) {

            $files = $model->where('part_id', $part->id)->orderBy('id', 'DESC')->paginate(10);
            return view('web.show_file', compact(['files', 'modelName']));
        } else {
            $files = $model->where('part_id', $part->id)
                ->with(['part'])->latest('id')->first();

            return view('web.show_file', compact(['files', 'modelName']));
        }
    }

    public function store(Part $part, $modelName, FileRequest $request)
    {
        if ($request->file('file')) {
            $path = 'files/' . $modelName . '/';
            $filePath = uploadImage($path, $request->file);
        }

        $model = selectModel($modelName);

        try {
            $model->file = $filePath;
            $model->user_id = Auth::user()->id;
            $model->part_id = $part->id;
            $model->save();

            event(new FileAdded($model, $modelName));
            $request->session()->flash('success', 'New file added successfully');
            
            return back();
        } catch (Exception $e) {
            // dd($e);
            
            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
        return  back();
    }

    public function download($id, $modelName, Request $request)
    {
        $model = selectModel($modelName);
        $file = $model->where('id', $id)->first();

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
        $file = $model->where('id', $request->file_id)->first();


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
