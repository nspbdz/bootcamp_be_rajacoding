<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dony()
    {
        // $data = Product::with('types')->get();
        $data = Product::get();
        // dd($data);
        return view('welcome', ['data' => $data]);
    }

    public function index()
    {
        $data = User::get();

        return view('welcome');
    }
}
