<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'logo', 'website'];
    protected $appends = ['logo_path'];

    //scopes -------------------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('website', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

    //attributes ----------------------------------------------------
    public function getLogoPathAttribute()
    {
        return Storage::url('logos/' . $this->logo);

    }// end of getLogoPathAttribute

    //relations ----------------------------------------------------
    public function employees()
    {
        return $this->hasMany(Employee::class);

    }// end of employees

}//end of model
