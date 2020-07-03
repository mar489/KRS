<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImgStoreRequest;
use Illuminate\Http\Request;

class ImgController extends Controller
{
    public function upload(Request $request)
    {
   $path = $request->file('img')->store('uploads', 'public');
   return view('product-create', ['path'=>$path]);
    }
}
