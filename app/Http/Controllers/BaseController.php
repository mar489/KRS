<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Person;
use App\Supercategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class BaseController extends Controller
{
//    public function __construct()
//    {
//        $supercategories = Supercategory::all();
//
//        View::share('supercategories', $supercategories);
//
//    }
}
