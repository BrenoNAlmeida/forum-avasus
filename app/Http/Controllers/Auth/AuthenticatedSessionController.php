<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        
        $request->session()->regenerate();

        $tipo = Auth::user()->tipo;

        if($tipo == 0)
        {   
            Alert::success('Sucesso', 'Login realizado com sucesso');
            return redirect()->route('dashboard-aluno');
        }
        if($tipo == 1)
        {
            Alert::success('Sucesso', 'Login realizado com sucesso');
            return redirect()->route('dashboard-professor');
        }
        if($tipo == 2)
        {
            Alert::success('Sucesso', 'Login realizado com sucesso');
            return redirect()->route('dashboard-superuser');
        }
        else
        {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
