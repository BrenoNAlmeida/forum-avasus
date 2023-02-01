<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
class RegisteredUserProfessorControler extends Controller
{
        /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register-professor');
    }
    #controller para cadastrp de professor
    public function store(Request $request)
    {
        $request->validate([

            'nome' => ['required', 'string', 'max:255'],
            'nome_social' => ['string', 'max:255', 'nullable'],
            'cpf' => ['required', 'string', 'max:15', 'unique:users'],
            'data_nascimento' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
        ]);
        $idade = Carbon::parse($request->data_nascimento)->age;
        if($idade < 18){
            Alert::error('Erro', 'Você precisa ter mais de 18 anos para se cadastrar');
            return redirect()->back();
                }
        else{
            $user = User::create([
            'nome' => $request->nome,
            'nome_social' => $request->nome_social,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'tipo' => 2,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        Professor::create([
            'user_id' => $user->id
        ]);
        Alert::success('Sucesso', 'Professor cadastrado com sucesso');
        return redirect('/dashboard-superuser');
    
    }


    }
}
