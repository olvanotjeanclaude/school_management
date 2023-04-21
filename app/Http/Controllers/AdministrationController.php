<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdministrationController extends Controller
{
    public function clear_cache(){
        Artisan::call("optimize");
        echo "cache cleared";
    }
}
