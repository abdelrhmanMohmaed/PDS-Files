<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashbourdController extends Controller
{
    public function index()
    {
        $data['allCompany'] = Company::get();

        return view('dashbourd.cat.index')->with($data);
    }
    public function show()
    {
        return view('dashbourd.profile.show');
    }
    public function storeCompany(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string|max:20|unique:companies,name',
        ]);
        $compantName = $request->companyName;

        Company::create([
            'name' => $compantName,
        ]);
        $request->session()->flash('success', 'PDS file has been uploaded successfully');
        return back();
    }
    public function storeModel(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:30|exists:companies,id',
            'model' => 'required|string|max:30|unique:car_models,name',
        ]);
        $companyId = $request->input('company');
        $modelName = $request->model;
        // dd($companyId);
        CarModel::create([
            'name' => $modelName,
            'company_id' => $companyId,
        ]);
        $request->session()->flash('success', 'PDS file has been uploaded successfully');
        return back();
    }
    public function updatePass(Request $request)
    {
        // start validtion in password inputs 
        $request->validate([
            'oldPassword' => 'required|min:5|max:25',
            'newPassword' => 'required|min:5|max:25',
            'password_confirmation' => 'required|same:newPassword',
        ]);
        // End validtion in password inputs 

        $user = Auth::user();
        $dataUser = User::findOrFail($user->id);

        //Start check the old password in Db == the old password in input and update the new password
        if (Hash::check($request->oldPassword, $dataUser->password)) {
            // dd($userId);
            $dataUser->update([
                // hash new password 
                'password' => Hash::make($request->newPassword)
            ]);
            Auth::logout();
            return redirect('/');
        }
        //End check the old password in Db == the old password in input and update the new password
        $request->session()->flash('error', 'Old Password dose not match..');
        return back();
    }
}
