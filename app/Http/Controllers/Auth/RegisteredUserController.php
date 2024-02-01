<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Unit;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $unit = Unit::orderBy('created_at', 'DESC')->get();
        return view('auth.register', compact('unit'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    { 
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'registration' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'is_admin' => ['required', 'int', 'max:255'],
            'is_active' => ['int', 'max:255'],
            'vaccin_confirm' => ['int', 'max:255'],
            'unit_id' => ['string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $userC = User::create([
            'name' => $request->name,
            'registration' => $request->registration,
            'phone' => $request->phone,
            'cep' => $request->cep,
            'address' => $request->address,
            'number' => $request->number,
            'is_admin' => $request->is_admin ?: 0,
            'is_active' => 1,
            'vaccin_confirm' => 0,
            'unit_id' => $request->unit_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($userC));

        Auth::login($userC);

        return redirect("administrator");
    }

    public function confirm(Request $request, string $id)
    {

        $confirmed = $this->user->where('id', $id)->update($request->except(
        '_token', 
        '_method',        
        'name',
        'registration',
        'phone',
        'cep',
        'address',
        'number',
        'is_admin',
        'is_active',
        'unit_id',
        'email',
        'password'
    ));

        if ($confirmed && $request->vaccin_confirm == 1) {
            return redirect()->back()->with('message', 'Confirmação realizada com sucesso!')->with('type', 'success');
        }
        elseif ($confirmed && $request->vaccin_confirm == 0) {
            return redirect()->back()->with('message', 'Confirmação cancelada com sucesso!')->with('type', 'success');
        }
        else {
            return redirect()->back()->with('message', 'Erro na confirmação!')->with('type', 'danger');
        }
    }
}
