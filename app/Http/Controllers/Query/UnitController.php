<?php

namespace App\Http\Controllers\Query;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public readonly Unit $unit;

    public function __construct()
    {
        $this->unit = new Unit();
    }

    public function index()
    {
        //retorna a view de login com a busca na tabela "access" no campo date_access
        $unit = Unit::orderBy('city', 'DESC')->get();
        return view('dependents', compact('access'));
    }
}
