<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subforum;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\SubForumRequest;
use App\Models\Professor;
use Illuminate\Support\Facades\Auth;

class SubForumController extends Controller
{

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard-professor');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function criar(Request $request, SubForum $subforum)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'texto' => ['required', 'string', 'max:255'],
            'categoria_id' => ['required'],
        ]);
        $professor = User::where('id', auth()->user()->id)->first();        
        $subforum = new Subforum;
        $subforum->titulo = $request->titulo;
        $subforum->texto = $request->texto;
        $subforum->ativo = true;
        $subforum->professor_id = Auth::id();
        $subforum->categoria_id = $request->categoria_id;
        $subforum->save();
        

        $subforuns_professor = User::where('id', auth()->user()->id)->first();


        return redirect()->route('dashboard-professor')->with('success', 'Subforum criado com sucesso!');
    }

    public function show($subforum)
    {
        $aluno = User::where('id', auth()->user()->id)->first();
        #subforum do id mandado no get
        $subforum = subforum::where('id', $subforum)->first();
        #posts do subforum
        $posts = post::where('subforum_id', $subforum->id)->latest()->get();
        #ordena os posts por data


        return view('subforum', ['aluno' => $aluno, 'posts' => $posts, 'subforum' => $subforum]);
    }
    public function detalhar($subforum)
    {
        $aluno = User::where('id', auth()->user()->id)->first();
        #subforum do id mandado no get
        $subforum = subforum::where('id', $subforum)->first();
        #posts do subforum
        $posts = post::where('subforum_id', $subforum->id)->latest()->get();
        #ordena os posts por data


        return view('detalhes-subforum', ['aluno' => $aluno, 'posts' => $posts, 'subforum' => $subforum]);
        }

    public function apagar($subforum){
        $subforum = Subforum::where('id', $subforum)->first();
        $subforum->delete();
        return redirect()->route('dashboard-superuser')->with('success', 'Subforum deletado com sucesso!');
    }


}
