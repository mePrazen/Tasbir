<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TestController extends Controller
{

    public function index()
    {
        return response()->json(['Success' => true]);
    }

}
