<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        return view('dashboard.welcome');

    }// end of index

}//end of controller
