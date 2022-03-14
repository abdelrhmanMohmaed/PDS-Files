<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packfile;
use App\Models\Pdsfile;
use App\Models\Workfile;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    public function storePds(Request $request, $id)
    {
        $request->validate([
            'pdsFile' => 'required|mimes:xlsx,xls,pdf,doc,docx,csv',
        ]);
        $partId = $id;

        $fileName = $request->file('pdsFile')->getClientOriginalName();
        $newName = time() . "-" . $fileName;

        $request->file('pdsFile')->storeAs('/pds', $newName);
        $created_By = Auth::user()->name . " - " . Auth::user()->seel_code;
        //start create the files in db  
        Pdsfile::create([
            'pds' => $newName,
            'created_By' => $created_By,
            'part_id' => $partId
        ]);
        //End create the files in db 
        // Start flash in view in uploaded successfully or no 
        $request->session()->flash('success', 'PDS file has been uploaded successfully');
        // End flash in view in uploaded successfully or no 
        return back();
    }

    public function storeWork(Request $request, $id)
    {
        $request->validate([
            'workFile' => 'required|mimes:xlsx,xls,pdf,doc,docx,csv',
        ]);
        $partId = $id;

        $fileName = $request->file('workFile')->getClientOriginalName();
        $newName = time() . "-" . $fileName;

        $request->file('workFile')->storeAs('/work', $newName);
        $created_By = Auth::user()->name . " - " . Auth::user()->seel_code;

        //start create the files in db  
        Workfile::create([
            'work_instruction' => $newName,
            'created_By' => $created_By,
            'part_id' => $partId
        ]);
        //End create the files in db 

        // Start flash in view in uploaded successfully or no 
        $request->session()->flash('success', 'Work Instruction file has been uploaded successfully');
        // End flash in view in uploaded successfully or no 
        return back();
    }

    public function storePack(Request $request, $id)
    {
        $request->validate([
            'packFile' => 'required|mimes:xlsx,xls,pdf,doc,docx,csv',
        ]);
        $partId = $id;

        $fileName = $request->file('packFile')->getClientOriginalName();
        $newName = time() . "- " . $fileName;

        $request->file('packFile')->storeAs('/pack', $newName);
        $created_By = Auth::user()->name . " - " . Auth::user()->seel_code;

        //start create the files in db  
        Packfile::create([
            'pack_instruction' => $newName,
            'created_By' => $created_By,
            'part_id' => $partId
        ]);
        //End create the files in db 

        // Start flash in view in uploaded successfully or no 
        $request->session()->flash('success', ' Pack Instruction file has been uploaded successfully');
        // End flash in view in uploaded successfully or no 
        return back();
    }
    // //////////////////////////////////////////////////////
    public function downloadPds(Request $request, $id)
    {
        $fileName = Pdsfile::where('id', $id)->first();
        // dd($fileName->pds);
        $path = "pds/";
        $filePath = $fileName->pds;
        try {
            return Storage::download($path . $filePath);
            // $request->session()->flash('error', 'should you select one file at least to deleted');
        } catch (Exception $e) {
            $msg = "file Not found !!";
        }
        $request->session()->flash('error', $msg);
        return back();
    }
    public function downloadWork(Request $request, $id)
    {
        $fileName = Workfile::where('id', $id)->first();
        // dd($fileName->work_instruction);
        $path = "work/";
        $filePath = $fileName->work_instruction;
        try {
            return Storage::download($path . $filePath);
            // $request->session()->flash('error', 'should you select one file at least to deleted');
        } catch (Exception $e) {
            $msg = "file Not found !!";
        }
        $request->session()->flash('error', $msg);
        return back();
    }
    public function downloadPack(Request $request, $id)
    {
        $fileName = Packfile::where('id', $id)->first();
        // dd($fileName->pds);
        $path = "pack/";
        $filePath = $fileName->pack_instruction;
        try {
            return Storage::download($path . $filePath);
            // $request->session()->flash('error', 'should you select one file at least to deleted');
        } catch (Exception $e) {
            $msg = "file Not found !!";
        }
        $request->session()->flash('error', $msg);
        return back();
    }
    //  ////////////////////////////////////////////
    public function deletePds(Request $request, $id)
    {
        $fileName = Pdsfile::where('id', $id)->first();
        // dd($fileName->pds);
        $path = "pds/";
        $filePath = $fileName->pds;
        try {
            Storage::delete($path . $filePath);
            $fileName->delete();
            $alert = 'success';
            $msg = "PDS file has been deleted";
        } catch (Exception $e) {
            $alert = 'error';
            $msg = "file has been existe";
        }
        $request->session()->flash($alert, $msg);
        return back();
    }

    //  ////////////////////////////////////////////
    public function deleteWork(Request $request, $id)
    {
        $fileName = Workfile::where('id', $id)->first();
        // dd($fileName->pds);
        $path = "work/";
        $filePath = $fileName->work_instruction;
        try {
            Storage::delete($path . $filePath);
            $fileName->delete();
            $alert = 'success';
            $msg = "work instruction file has been deleted";
        } catch (Exception $e) {
            $alert = 'error';
            $msg = "file has been existe";
        }
        $request->session()->flash($alert, $msg);
        return back();
    }
    //  ////////////////////////////////////////////
    public function deletePack(Request $request, $id)
    {
        $fileName = Packfile::where('id', $id)->first();
        // dd($fileName->pds);
        $path = "pack/";
        $filePath = $fileName->pds;
        try {
            Storage::delete($path . $filePath);
            $fileName->delete();
            $alert = 'success';
            $msg = "Pack instruction file has been deleted";
        } catch (Exception $e) {
            $alert = 'error';
            $msg = "file has been existe";
        }
        $request->session()->flash($alert, $msg);
        return back();
    }
}
