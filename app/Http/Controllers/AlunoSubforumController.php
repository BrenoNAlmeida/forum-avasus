<?php

namespace App\Http\Controllers;

use App\Models\Subforum;
use App\Models\User;
use Illuminate\Http\Request;

class AlunoSubforumController extends Controller
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Subforum $subforum)
    {
        $alunos = User::where('tipo', 0)->get();
        return view('vincular-aluno-subforum', ['alunos' => $alunos,'subforum' => $subforum->id]);
    }

    public function vincular($subforum_id, $id)
    {
        
        $subforum = Subforum::find($subforum_id);
        $subforum->aluno_id = $id;
        $subforum->save();
        $alunos = User::where('tipo', 0)->get();
        return view('vincular-aluno-subforum', ['alunos' => $alunos , 'subforum' => $subforum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
