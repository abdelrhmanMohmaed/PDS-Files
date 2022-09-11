<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\ModelCar;
use App\Models\Part;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view('web.home', compact('companies'));
    }

    public function show(Part $part)
    {
        return view('web.show', compact('part'));
    }

    public function getModels(Request $request)
    {
        $models = ModelCar::where('company_id', $request->companyId)->get();

        $output = '<option disabled selected value="">Select Model</option>';
        foreach ($models as $model) {
            $output .= '
            <option value="' . $model->id . '">
                    ' . $model->name . '
            </option>';
        };
        return  $output;
    }

    public function getParts(Request $request)
    {
        $parts = Part::where('model_id', $request->modelId)->get();

        $output = '<option disabled selected value="">Select Part</option>';
        foreach ($parts as $part) {
            $output .= '
            <option value="' . $part->id . '">
                    ' . $part->part_num . '
            </option>';
        };
        return  $output;
    }
}
