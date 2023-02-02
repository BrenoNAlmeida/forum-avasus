<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Subforum;
use App\Models\Post;
use App\Models\Resposta;
use App\Models\UserSubforum;
use tidy;

class alunosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nome' => 'Breno Nascimento de Almeida',
            'nome_social' => 'Brenao',
            'cpf' => '124.276.974-00',
            'data_nascimento' => '2002-10-10',
            'estado' => 'São Paulo',
            'cidade' => 'São Paulo',
            'password' => Hash::make('12345678'),
        ]);

        $user2 = User::create([
            'nome' => 'João Nascimento de Almeida',
            'nome_social' => 'joão',
            'cpf' => '124.276.974-01',
            'data_nascimento' => '2002-10-10',
            'estado' => 'São Paulo',
            'cidade' => 'São Paulo',
            'tipo'=> 1,
            'password' => Hash::make('12345678'),
        ]);
        $user3 = User::create([
            'nome' => 'Popis Nascimento de Almeida',
            'nome_social' => 'popy',
            'cpf' => '124.276.974-02',
            'data_nascimento' => '2002-10-10',
            'estado' => 'São Paulo',
            'cidade' => 'São Paulo',
            'tipo'=> 2,
            'password' => Hash::make('12345678'),
        ]);
        $user4 = User::create([
            'nome' => 'Jose Nascimento de Almeida',
            'nome_social' => 'jose',
            'cpf' => '124.276.974-03',
            'data_nascimento' => '2002-10-10',
            'estado' => 'São Paulo',
            'cidade' => 'São Paulo',
            'tipo'=> 0,
            'password' => Hash::make('12345678'),
        ]);
        
        $professor = Professor::create([
            'user_id' => $user2->id,
        ]);

        $aluno = Aluno::create([
            'user_id' => $user->id,

        ]);

        $subforun = Subforum::create([
            'titulo' => 'vamo ver',
            'texto' => 'Subforum para teste',
            'ativo' => true,
            'professor_id' => $user2->id,
            'categoria_id' => 2,
        ]);

        UserSubforum::create([
            'user_id' => $user->id,
            'subforum_id' => $subforun->id,
        ]);



        $post = Post::create([
            'titulo' => 'teste',
            'texto' => 'Post para teste',
            'ativo' => true,
            'aluno_id' => $user->id,
            'subforum_id' => $subforun->id,
        ]);
        $post2 = Post::create([
            'titulo' => 'teste2',
            'texto' => 'Post para teste2',
            'ativo' => true,
            'aluno_id' => $user->id,
            'subforum_id' => $subforun->id,
        ]);
        $resposta = Resposta::create([
            'texto' => 'Resposta para teste',
            'aluno_id' => $user->id,
            'post_id' => $post->id,
        ]);

    }
}
