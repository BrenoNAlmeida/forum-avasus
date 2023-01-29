<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Topicos do subforum: 
            {{ $subforum->titulo }}
        </h2>

        <!-- botão para criar um novo post -->
       <div>
            <a href="{{ route('subforum', $subforum->id ) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-5 px-4 rounded float:right" >Criar Topico</a>
    </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- tabela com os subforuns associados ao aluno-->
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Titulo</th>
                                <th class="px-4 py-2">autor</th>
                                <th class="px-4 py-2">quantidade de respostas</th>
                                <th class="px-4 py-2">data de criação</th>
                                <th class="px-4 py-2">data da ultima resposta</th>
                                <th class="px-4 py-2">ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)

                                @php 
                                    $professor = App\Models\User::find($post->professor_id,);
                                    $quantidade_respotas = App\Models\Resposta::where('post_id', $post->id)->count();
                                    $autor = App\Models\User::where('id', $post->aluno_id)->first();
                                    if($autor->nome_social == null){
                                        $autor = $autor->nome;
                                    }
                                    else{
                                        $autor = $autor->nome_social;
                                    }

                                    $ultima_resposta = App\Models\Resposta::where('post_id', $post->id)->orderBy('created_at', 'desc')->first();
                                    
                                    if($ultima_resposta != null){
                                        $ultima_resposta = $ultima_resposta->created_at;
                                    }
                                    else{
                                        $ultima_resposta = $post->created_at;
                                    }

                                @endphp

                                <tr>
                                    <th class="border px-4 py-2">{{ $post->titulo }}</th>
                                    <th class="border px-4 py-2">{{ $autor }}</th>
                                    <th class="border px-4 py-2">{{$quantidade_respotas}}</th>
                                    <th class="border px-4 py-2">{{$post->created_at}}</th>
                                    <th class="border px-4 py-2">{{$ultima_resposta}}</th>
                                    <th class="border px-4 py-2">
                                        <a href="{{ route('subforum', $subforum->id ) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Responder</a>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</x-app-layout>
