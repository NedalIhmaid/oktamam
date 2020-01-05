<?php

namespace App\Http\Controllers\Dashboard;

use App\Company;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $employees = Employee::whenSearch(request()->search)
            ->whenCompany(request()->company_id)
            ->with('company')
            ->paginate(10);

        return view('dashboard.employees.index', compact('companies', 'employees'));

    }//end of index

    public function create()
    {
        $companies = Company::all();
        return view('dashboard.employees.create', compact('companies'));

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        Employee::create($request->all());

        session()->flash('success', 'Data added successfully');
        return redirect()->route('dashboard.employees.index');

    }//end of store

    public function edit(Employee $employee)
    {
        return view('dashboard.employees.edit', compact('employee'));

    }//end of edit

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|unique:employees,name,' . $employee->id,
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'logo' => 'sometimes|nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'required|url',
        ]);

        $request_data = $request->except(['logo']);

        if ($request->logo) {

            //delete the old logo
            Storage::disk('local')->delete('public/logos/' . $employee->logo);
            $request->file('logo')->store('logos', 'public');
            $request_data['logo'] = $request->logo->hashName();

        }//end of if 

        $employee->update($request_data);
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.employees.index');

    }//end of update

    public function destroy(Employee $employee)
    {
        $employee->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.employees.index');

    }//end of destroy

}//end of controller
