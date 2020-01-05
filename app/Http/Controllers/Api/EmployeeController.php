<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;

/**
 * @group Employees
 */
class EmployeeController extends Controller
{
    /**
     * Index
     *List all employees
     * @responseFile responses/employees.index.json
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $employees = Employee::whenSearch(request()->search)->paginate(10);
        return EmployeeResource::collection($employees);

    }// end of index

}//end of controller
