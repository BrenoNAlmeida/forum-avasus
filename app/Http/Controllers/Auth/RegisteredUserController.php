<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register-aluno');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([

            'nome' => ['required', 'string', 'max:255'],
            'nome_social' => ['string', 'max:255'],
            'cpf' => ['required', 'string', 'cpg', 'max:15', 'unique:users'],
            'data_nascimento' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'nome-social' => $request->nome_social,
            'cpf' => $request->cpf,
            'data-nascimento' => $request->data_nascimento,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $aluno = Aluno::create([
            'user_id' => $user->id,
        ]);
        
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
