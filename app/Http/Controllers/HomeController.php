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
        if ($request->ajax()) {
            $models = ModelCar::where('company_id', $request->companyId)->get();
            $output = getData($models);
        }
        return $output;
    }

    public function getParts(Request $request)
    {
        if ($request->ajax()) {
            $parts = Part::where('model_id', $request->modelId)->get();
            $output = getData($parts);
        }
        return $output;
    }
}
