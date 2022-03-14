<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Packfile;
use App\Models\Part;
use App\Models\Pdsfile;
use App\Models\Workfile; 
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth; 

class PartsController extends Controller
{
    public function show($id)
    {
        // get the company_id becouse select all models with company 
        $partId = $id;
        $data['parts'] = Part::where('id', $partId)->get();
        return view('web.parts.show')->with($data);
    }

    public function pds(Request $request)
    {
        //get companyId in select option nw 
        $partId = $request->get('partId');
        // select all models in db where companyId 
        $files = Pdsfile::where('part_id', $partId)
            ->orderBy('id', 'desc')
            ->get();
        $output = '';
        $output .= '
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Part Number</th>
                            <th>Data Time</th>
                            <th>Created By</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
        <tbody>';
        foreach ($files as $index => $file) {
            $output .= ' 
            <tr>
                <th scope="row">
                    ' . $index + 1 . '
                </th>
                <td>
                    ' . $file->pds . '
                </td>
                <td>
                ' . Carbon::parse($file->created_at)->format('d M, Y / H:i:s') . '
                </td>
    
                <td>' . $file->created_By . '</td>
                <td>
                    <a id="download-Pds" class="btn btn-info btn-sm" href="/downloud-pds/' . $file->id . '">Download</a>';
            if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'superAdmin') {
                $output .= ' <a class="btn btn-danger btn-sm" href="/delete-pds/' . $file->id . '">Delete</a>';
            };
            '</td>
            </tr>';
        }
        $output .= '</tbody>';
        echo $output;
    }

    public function work(Request $request)
    {
        //get companyId in select option nw 
        $partId = $request->get('partId');
        // select all models in db where companyId 
        $files = Workfile::where('part_id', $partId)
            ->orderBy('id', 'desc')
            ->get();
        $output = '';

        $output .= '
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Part Number</th>
                            <th>Data Time</th>
                            <th>Created By</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
        <tbody>';

        foreach ($files as $index => $file) {
            $output .= ' 
            <tr>
                <th scope="row">
                    ' . $index + 1 . '
                </th>
                <td>
                    ' . $file->work_instruction . '
                </td>
                <td>
                ' . Carbon::parse($file->created_at)->format('d M, Y / H:i:s') . '
                </td>
    
                <td>' . $file->created_By . '</td>
                <td>
                    <a class="btn btn-info btn-sm" href="/downloud-work/' . $file->id . '">Download</a>';
            if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'superAdmin') {
                $output .= ' <a class="btn btn-danger btn-sm" href="/delete-work/' . $file->id . '">Delete</a>';
            };
            '</td>
            </tr>';
        }
        $output .= '</tbody>';
        echo $output;
    }

    public function pack(Request $request)
    {
        //get companyId in select option nw 
        $partId = $request->get('partId');
        // select all models in db where companyId 
        $files = Packfile::where('part_id', $partId)
            ->orderBy('id', 'desc')
            ->get();
        $output = '';

        $output .= '
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Part Number</th>
                            <th>Data Time</th>
                            <th>Created By</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
        <tbody>';
        foreach ($files as $index => $file) {
            $output .= ' 
            <tr>
                <th scope="row">
                    ' . $index + 1 . '
                </th>
                <td>
                    ' . $file->pack_instruction . '
                </td>
                <td>
                    

                    ' . Carbon::parse($file->created_at)->format('d M, Y / H:i:s') . '
                </td>
    
                <td>' . $file->created_By . '</td>
                <td>
                    <a  class="btn btn-info btn-sm" href="/downloud-pack/' . $file->id . '">Download</a>';
            if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'superAdmin') {
                $output .= ' <a class="btn btn-danger btn-sm" href="/delete-pack/' . $file->id . '">Delete</a>';
            };
            '</td>
            </tr>';
        }
        $output .= '</tbody>';
        // pack_instruction
        echo $output;
    }

}
