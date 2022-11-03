<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\ModelCar;
use App\Models\Part;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CatController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        $models = ModelCar::get();
        return view('cat.index', compact('companies', 'models'));
    }
    
    public function store_company(Request $request)
    {
        $request->validate([
            'company' => 'required|string|min:3|max:50|unique:companies,name',
        ], [
            'company.unique' => 'Company already Exists'
        ]);
        try {
            Company::create(['name' => $request->company]);

            $request->session()->flash('success', 'New Company added successfully (' . $request->company . ')');
            // Alert::success('New Company added successfully (' . $request->company . ')');
            return back();
        } catch (\Exception $e) {

            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            // Alert::error('Something is wrong please try again!!');
            return back();
        }
        return back();
    }
    
    public function store_model(Request $request)
    {
        $request->validate([
            'companies' => 'required|string|exists:companies,id',
            'model' => 'required|string|min:3|max:30|unique:models,name',
        ], [
            'model.unique' => 'Model already Exists',
        ]);
        try {
            ModelCar::create([
                'name' => $request->model,
                'company_id' => $request->companies,
            ]);

            $request->session()->flash('success', 'New Model added successfully (' . $request->model . ')');
            // Alert::success('New Model added successfully (' . $request->model . ')');
            return back();
        } catch (\Exception $e) {
            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            // Alert::error('Something is wrong please try again!!');
            return back();
        }
        return back();
    }

    public function store_part(Request $request)
    {
        $request->validate([
            'com' => 'required|string|exists:companies,id',
            'mod' => 'required|string|exists:companies,id',
            'part_num' => 'required|string|min:3|max:16',
        ]);
        try {
            Part::create([
                'model_id' => $request->mod,
                'name' => $request->part_num,
            ]);

            $request->session()->flash('success', 'New Part added successfully (' . $request->part_num . ')');
            // Alert::success('New Part added successfully (' . $request->part_num . ')');
            return back();
        } catch (\Exception $e) {
            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            // Alert::error('Something is wrong please try again!!');
            return back();
        }
        return back();
    }
}
