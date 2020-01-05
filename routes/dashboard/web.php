<?php

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        //welcome route
        Route::get('/', 'WelcomeController')->name('welcome');

        //company routes
        Route::resource('companies', 'CompanyController')->except(['show']);

        //employee routes
        Route::resource('employees', 'EmployeeController')->except(['show']);
    });