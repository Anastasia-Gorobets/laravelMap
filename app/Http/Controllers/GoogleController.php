<?php

namespace App\Http\Controllers;

use App\Models\User;
use Cornford\Googlmapper\Mapper;
use Illuminate\Http\Request;

class GoogleController extends Controller
{


    public function index()
    {

        return view('map',['users'=>User::get()->pluck('address')]);
    }

    public function map2()
    {
        Mapper::map(53.381128999999990000, -1.470085000000040000);

        return view('map2');
    }


}
