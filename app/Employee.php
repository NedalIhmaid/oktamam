<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone'];

    //scopes -------------------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('first_name', 'like', "%$search%")
                ->orWhere('last_name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

    public function scopeWhenCompany($query, $company_id)
    {
        return $query->when($company_id, function ($q) use ($company_id) {

            return $q->whereHas('company', function ($qu) use ($company_id) {

                return $qu->where('id', $company_id);

            });

        });

    }// end of scopeWhenCompany

    //relations ------------------------------------------------
    public function company()
    {
        return $this->belongsTo(Company::class);

    }// end of company

}//end of model
