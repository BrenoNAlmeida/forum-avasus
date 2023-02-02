<?php

namespace App\Http\Controllers;

use App\Models\Resposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Post;

class RespostaController extends Controller
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

        $resposta = new Resposta();
        $resposta->post_id = $request->post_id;
        $resposta->aluno_id = $request->aluno_id;
        $resposta->texto = $request->texto;
        $resposta->save();

        $post = Post::find($request->post_id);
        $post->save();

        $respostas = Resposta::where('post_id', $request->post_id)->get();

        return view('responder-post',['post' => $post, 'respostas' => $respostas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $respostas = Resposta::where('post_id', $post->id)->get();
        return view('responder-post',['post' => $post, 'respostas' => $respostas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function edit(Resposta $resposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resposta $resposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resposta $resposta)
    {
        //
    }
}
