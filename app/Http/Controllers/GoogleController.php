<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GoogleController extends Controller
{


    public function index()
    {

        return view('map',['users'=>User::get()->pluck('address')]);
    }


}
