<?php

namespace App\Http\Controllers\Query;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function units()
    {
        $units = Unit::all();
        return view('register', compact('units'));
    }
}
