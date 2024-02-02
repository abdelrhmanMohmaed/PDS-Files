<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\StoreModelRequest;
use App\Http\Requests\StorePartRequest;
use App\Models\Company;
use App\Models\ModelCar;
use App\Models\Part;
use Exception;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index()
    {
        $models = ModelCar::get();
        $companies = Company::get();
        return view('cat.index', compact('companies', 'models'));
    }

    public function store_company(StoreCompanyRequest $request)
    {
        try {
            Company::create(['name' => $request->company]);

            $request->session()->flash('success', 'New Company added successfully (' . $request->company . ')');
            return back();
        } catch (\Exception $e) {

            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
        return back();
    }

    public function store_model(StoreModelRequest $request)
    {
        try {
            ModelCar::create([
                'name' => $request->model,
                'company_id' => $request->companies,
            ]);

            $request->session()->flash('success', 'New Model added successfully (' . $request->model . ')');
            return back();
        } catch (Exception $e) {
            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
        return back();
    }

    public function store_part(StorePartRequest $request)
    {
        try {
            Part::create([
                'model_id' => $request->mod,
                'name' => $request->part_num,
            ]);

            $request->session()->flash('success', 'New Part added successfully (' . $request->part_num . ')');
            return back();
        } catch (Exception $e) {
            $request->session()->flash('wrong', 'Something is wrong please try again!!');
            return back();
        }
        return back();
    }

    public function edit()
    {
        $companies = Company::get();
        $models = ModelCar::get();
        $parts = Part::get();

        return view('cat.edit', compact('companies', 'models', 'parts'));
    }

    public function update_part(Request $request)
    {
        $part = Part::find($request->id);
        if (!$part) return redirect()->route('category.edit')->with('wrong', 'Something is wrong please try again!!');
        $part->update($request->except(['_token']));

        return redirect()->route('category.edit')->with('success', 'Part updated successfully');
    }

    public function update_model(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50|unique:models,name',
        ], [
            'name.unique' => 'Model name already Exists..'
        ]);

        $model = ModelCar::find($request->id);
        if (!$model) return redirect()->route('category.edit')->with('wrong', 'Something is wrong please try again!!');
        $model->update($request->except(['_token']));

        return redirect()->route('category.edit')->with('success', 'Model updated successfully');
    }

    public function update_company(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50|unique:companies,name',
        ], [
            'name.unique' => 'Company name already Exists..'
        ]);

        $company = Company::find($request->id);
        if (!$company) return redirect()->route('category.edit')->with('wrong', 'Something is wrong please try again!!');
        $company->update($request->except(['_token']));

        return redirect()->route('category.edit')->with('success', 'Company updated successfully');
    }

    public function delete_part(Request $request)
    {
        $part = Part::find($request->id);
        if (!$part) return redirect()->route('category.edit')->with('wrong', 'Something is wrong please try again!!');
        try {
            // Note: her you should upgrade this fun
            $part->delete();
            return redirect()->route('category.edit')->with('success', 'Part deleted successfully');
        } catch (Exception $e) {
            // return $e;
            return redirect()->route('category.edit')->with('wrong', 'Something is wrong, please try to check not (files) not related this part!!');
        }
    }

    public function delete_model(Request $request)
    {
        $model = ModelCar::find($request->id);
        if (!$model) return redirect()->route('category.edit')->with('wrong', 'Something is wrong please try again!!');
        try {
            $model->delete();
            return redirect()->route('category.edit')->with('success', 'Model deleted successfully');
        } catch (Exception $e) {
            // return $e;
            return redirect()->route('category.edit')->with('wrong', 'Something is wrong, please try to check not (files, parts) not related this model!!');
        }
    }

    public function delete_company(Request $request)
    {
        $company = Company::find($request->id);
        if (!$company) return redirect()->route('category.edit')->with('wrong', 'Something is wrong please try again!!');
        try {
            $company->delete();
            return redirect()->route('category.edit')->with('success', 'Company deleted successfully');
        } catch (Exception $e) {
            // return $e;
            return redirect()->route('category.edit')->with('wrong', 'Something is wrong, please try to check not (files, parts, models) not related this company!!');
        }
    }
}
