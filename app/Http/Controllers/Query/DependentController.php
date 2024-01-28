<?php

namespace App\Http\Controllers\Query;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dependent;

class DependentController extends Controller
{
    public function create()
    {
        $dependent = Dependent::orderBy('created_at', 'DESC')->get();
        return view('dependents', compact('dependent'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'cpf' => ['required', 'string', 'max:255', 'unique:'.Dependent::class],
            'birth_date' => ['required', 'date', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'vaccine_id' => ['required', 'int', 'max:255', 'unique:'.Dependent::class],
            'employee_id' => ['int', 'max:255', 'unique:'.Dependent::class, 'default:'.Auth::user()->id],
            'is_active' => ['int', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'vaccine_id' => $request->vaccine_id,
            'employee_id' => $request->employee_id,
            'is_active' => $request->is_active,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect("administrator");
    }
}
