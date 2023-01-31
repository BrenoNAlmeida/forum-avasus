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
    public function criar(Request $request, User $professor)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'texto' => ['required', 'string', 'max:255'],
            'categoria_id' => ['required'],
        ]);
        $professor_id = auth()->user()->id;
        $subforum = Subforum::create([
            'titulo' => $request->nome,
            'texto' => $request->texto,
            'categoria_id' => $request->categoria,
            'professor_id' => $professor_id,
        ]);

        $subforuns_professor = User::where('id', auth()->user()->id)->first();


        return redirect()->route('{subforum->id}/subforum');
    }

    public function show($subforum)
    {
            $aluno = User::where('id', auth()->user()->id)->first();
            #subforum do id mandado no get
            $subforum = subforum::where('id', $subforum)->first();
            #posts do subforum
            $posts = post::where('subforum_id', $subforum->id)->oldest()->get();
            #ordena os posts por data


            return view('subforum', ['aluno' => $aluno, 'posts' => $posts, 'subforum' => $subforum]);
        }

}
