<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyCheckController extends Controller
{
    public function index()
    {
        return view('checks/mycheck');
    }
}
