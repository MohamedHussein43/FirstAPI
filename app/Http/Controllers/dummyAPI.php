<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    function getData()
    {
        return ['name'=>'Mohammed','email'=>'mohammed@gmail.com'];
    }
}
