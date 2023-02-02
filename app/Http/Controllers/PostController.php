<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Resposta;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    public function trancar(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $post->ativo = false;
        $post->save();
        return redirect()->route('detalhes-subforum', $post->subforum_id);
    }

    public function destrancar(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $post->ativo = true;
        $post->save();
        return redirect()->route('detalhes-subforum', $post->subforum_id);
    }

    public function criar_post (Request $request )
    {
        $post = new Post();
        $post->titulo = $request->titulo;
        $post->texto = $request->texto;
        $post->subforum_id = $request->subforum_id;
        $post->aluno_id = auth()->user()->id;
        $post->ativo = true;
        $post->save();

        $respostas = Resposta::where('post_id', $post->id)->get();
        
        
        if(auth()->user()->tipo == 0)
            return view('responder-post',['post' => $post, 'respostas' => $respostas]);
        elseif(auth()->user()->tipo == 1)
        return view('responder-post',['post' => $post, 'respostas' => $respostas]);
        else
            return redirect()->route('dashboard-superuser');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
