<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\Company;
use App\Models\Part;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // start fun to get all company in home page
    public function index()
    {
        $data['allCompany'] = Company::select('id', 'name')
            ->orderBy('id', 'asc')
            ->get();
        return view('web.home.index')->with($data);
    }
    // End fun to get all company in home page

    // start fun to get all models in by company Id  ajax request
    public function getModels(Request $request)
    {
        //get companyId in select option nw 
        $companyId = $request->get('companyId');
        // select all models in db where companyId 
        $models = CarModel::select('id', 'name')
            ->where('company_id', $companyId)
            ->orderBy('id', 'asc')
            ->get();
        // the defult option in view
        $output = '<option value="">Select Model</option>';
        //start for loop to set all model in view getParts
        foreach ($models as $model) {
            $output .= '
            <option value="' . $model->id . '">
                    ' . $model->name . '
            </option>';
        };
        //end for loop to set all model in view
        echo $output;
    }
    // End fun to get all parts in by company Id ajax request

    // start fun to get all parts in by model Id ajax request
    public function getParts(Request $request)
    {
        $modelId = $request->get('modelId');
        // select all models in db where modelId 
        $parts = Part::select('id', 'part_num')
            ->where('car_model_id', $modelId)
            ->orderBy('id', 'asc')
            ->get();
        // the defult option in view
        $output = '<option value="">Select P-Number</option>';
        //start for loop to set all model in view  
        foreach ($parts as $part) {
            $output .= '<option value="' . $part->id . '">' . $part->part_num . '</option>';
        };
        //end for loop to set all parts in view
        echo $output;
    }
    // End fun to get all parts in by model Id ajax request
}
