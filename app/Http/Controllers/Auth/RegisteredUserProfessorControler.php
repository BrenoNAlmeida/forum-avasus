<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
class RegisteredUserProfessorControler extends Controller
{
    #controller para cadastrp de professor
    public function store (Request $request)
    {
        $request->validate([
            'user_id'=> ['required', 'integer', 'unique:professors'],
        ]);

        $professor = Professor::create([
            'user_id' => $request->user_id,
        ]);

        event(new Registered($professor));

        Auth::login($professor);

        return redirect(RouteServiceProvider::HOME);
    }
}
