<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;

/**
 * @group Companies
 */
class CompanyController extends Controller
{
    /**
     * Index
     *List all companies
     * @responseFile responses/companies.index.json
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $companies = Company::whenSearch(request()->search)->paginate(10);
        return CompanyResource::collection($companies);

    }// end of index

}//end of controller
