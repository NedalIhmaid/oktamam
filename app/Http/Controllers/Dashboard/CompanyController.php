<?php

namespace App\Http\Controllers\Dashboard;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::whenSearch(request()->search)
            ->withCount('employees')
            ->paginate(10);

        return view('dashboard.companies.index', compact('companies'));

    }//end of index

    public function create()
    {
        return view('dashboard.companies.create');

    }//end of create

    public function store(StoreCompany $request)
    {
        $request_data = $request->all();

        if ($request->logo) {

            $request->file('logo')->store('logos', 'public');
            $request_data['logo'] = $request->logo->hashName();

        }//end of if

        Company::create($request_data);

        session()->flash('success', 'Data added successfully');
        return redirect()->route('dashboard.companies.index');

    }//end of store

    public function edit(Company $company)
    {
        return view('dashboard.companies.edit', compact('company'));

    }//end of edit

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|unique:companies,name,' . $company->id,
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'logo' => 'sometimes|nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'required|url',
        ]);

        $request_data = $request->except(['logo']);

        if ($request->logo) {

            //delete the old logo
            Storage::disk('local')->delete('public/logos/' . $company->logo);
            $request->file('logo')->store('logos', 'public');
            $request_data['logo'] = $request->logo->hashName();

        }//end of if 

        $company->update($request_data);
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.companies.index');

    }//end of update

    public function destroy(Company $company)
    {
        //delete logo file
        Storage::disk('local')->delete('public/logos/' . $company->logo);

        $company->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.companies.index');

    }//end of destroy

}//end of controller
