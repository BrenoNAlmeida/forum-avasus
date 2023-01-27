<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Aluno $aluno)
    {
        $this->authorize('viewAny', Aluno::class);
        $this->authorize('view', $aluno);
        return view('aluno.index',['alunos' => $aluno]);
    }

    public function create()
    {
        $this->authorize('create', Aluno::class);
        

        return view('aluno.create');
    }

    public function topicos(Aluno $aluno)
    {
        $this->authorize('view', $aluno);
        
        return view('aluno.topicos',['aluno' => $aluno]);
    }

}
