<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subforum;
use App\Models\User;
use App\Models\Post;

class SubForumController extends Controller
{
    //

    public function index()
    {
        return view('subforum.index');
    }

    public function store($subforum)
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
