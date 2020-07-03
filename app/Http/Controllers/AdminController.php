<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Order;
use App\Person;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.orders', [
            'orders' => Order::orderBy('status_id')->get(),
            'statuses' => Status::all()
        ]);
    }
}
