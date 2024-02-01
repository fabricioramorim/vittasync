<?php

namespace App\Http\Controllers\Query;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AccessController extends Controller
{

    public readonly Access $access;

    public function __construct()
    {
        $this->access = new Access();
    }

    public function index()
    {
        //retorna a view de login com a busca na tabela "access" no campo date_access
        $access = Access::orderBy('date_access', 'DESC')->get();
        return view('auth.login', compact('access'));
    }
}
