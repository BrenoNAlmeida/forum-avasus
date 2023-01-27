<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Subforum;
use App\Models\Post;
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
            'nome_social' => 'Brunão',
            'cpf' => '124.276.974-01',
            'data_nascimento' => '2002-10-10',
            'estado' => 'São Paulo',
            'cidade' => 'São Paulo',
            'tipo'=> 1,
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
            'aluno_id' => $aluno->id,
        ]);
        $post = Post::create([
            'titulo' => 'teste',
            'texto' => 'Post para teste',
            'ativo' => true,
            'aluno_id' => $user->id,
            'subforum_id' => $subforun->id,
        ]);

    }
}
