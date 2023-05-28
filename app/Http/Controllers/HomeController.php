<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Machine;
use App\Models\ModelCar;
use App\Models\Part;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view('web.home.index', compact('companies'));
    }

    public function show(Part $part)
    {
        $machines = Machine::get();
        return view('web.files.show', compact('part', 'machines'));
    }

    public function getModels(Request $request)
    {
        if ($request->ajax()) {
            $models = ModelCar::whereCompanyId($request->companyId)->get();
            $output = getData($models);
            return $output;
        } else {
            return back();
        }
    }

    public function getParts(Request $request)
    {
        if ($request->ajax()) {
            $parts = Part::whereModelId($request->modelId)->get();
            $output = getData($parts);
            return $output;
        } else {
            return back();
        }
    }
}
