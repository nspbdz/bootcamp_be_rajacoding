<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dony()
    {
        $data = User::get();

        return view('welcome');
    }

    public function index()
    {
        $data = User::get();

        return view('welcome');
    }
}
