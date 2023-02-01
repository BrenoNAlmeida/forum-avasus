<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Subforum;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {   
            return redirect()->route('dashboard');  
    }

    public function aluno()
    {
        if(auth()->user()->tipo == 0)
        {
            $aluno = User::where('id', auth()->user()->id)->first();
            #subforuns de um aluno 
            $subforuns_aluno = subforum::where('aluno_id', $aluno->id)->get();

            return view('dashboard-aluno', ['aluno' => $aluno, 'subforuns' => $subforuns_aluno]);
        }
    }

    public function professor()
    {
        if(auth()->user()->tipo == 1)
        {
            
            $professor = User::where('id', auth()->user()->id)->first();
            #subforuns de um professor
            $subforuns_professor = subforum::where('professor_id', $professor->id)->get();
            return view('dashboard-professor', ['professor' => $professor, 'subforuns' => $subforuns_professor]);
        }
    }

    public function superuser()
    {
        if(auth()->user()->tipo == 2)
        {
            $subforuns = subforum::all();    
            return view('dashboard-superuser', ['subforuns' => $subforuns]);
        }
    }

}
