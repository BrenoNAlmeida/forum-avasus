<x-app-layout>
    <x-slot name="header" class="flex justify-between">

        <div class="flex justify-between itens-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                subforum - 
                {{ $subforum->titulo }}
            </h2>
        </div>
                <section x-data="{ modalopen: false}">
            <section x-show="modalopen" class="w-screen fixed flex itens-center justify-center">
                <div class="rounded w-72 p-4 bg-white shadow mt-4">
                    <div>
                        <form method="POST" action="/criar-post">
                            @csrf
                            <!-- titulo -->
                            <div>
                                <x-label for="titulo" :value="__('titulo')" />

                                <x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus />
                            </div>

                            <!-- descrição-->
                            <div class="mt-4">
                                <x-label for="texto" :value="__('descricao')" />

                                <x-input id="texto" class="block mt-1 w-full" type="text" name="texto" :value="old('texto')" required />
                            </div>

                            <input type="hidden" name="subforum_id" value="{{ $subforum->id }}">

                            <div class="col-sm-10">
                                <button type="submit" class=" mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded ">Salvar</button>
                            </div>
                        </form>
                    </div>
                    <button class=" mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded " @click="modalopen = false">Cancelar</button>
                </div>
            </section>
            <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded"
                @click="modalopen = true">Criar Topico
            </button>
        </section>
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
                                    $professor = App\Models\User::find($post->professor_id);
                                    $quantidade_respotas = App\Models\Resposta::where('post_id', $post->id)->count();
                                    $autor = App\Models\User::where('id', $post->aluno_id)->first();
                                    if ($autor->nome_social == null) {
                                        $autor = $autor->nome;
                                    } else {
                                        $autor = $autor->nome_social;
                                    }

                                    $ultima_resposta = App\Models\Resposta::where('post_id', $post->id)
                                        ->orderBy('created_at', 'desc')
                                        ->first();
                                    
                                    if ($ultima_resposta != null) {
                                        $ultima_resposta = $ultima_resposta->created_at;
                                    } else {
                                        $ultima_resposta = 0;
                                    }
                                    
                                @endphp

                                <tr>
                                    @if ($post->ativo == false)
                                        <th class="border px-4 py-2">Trancado - {{ $post->titulo }}</th>
                                    @else
                                        <th class="border px-4 py-2">{{ $post->titulo }}</th>
                                    @endif
                                    <th class="border px-4 py-2">{{ $autor }}</th>
                                    <th class="border px-4 py-2">{{ $quantidade_respotas }}</th>
                                    <th class="border px-4 py-2">{{ $post->created_at }}</th>
                                    <th class="border px-4 py-2">{{ $ultima_resposta }}</th>
                                    <!-- botão para responder -->
                                    @if (Auth::user()->tipo == 0 && $post->ativo == true)
                                        <th class="border px-4 py-2">
                                            <a href="{{ route('responder-topico', [$post,]) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Responder</a>
                                        </th>

                                        <!-- botão para adicionar aluno -->
                                    @elseif(Auth::user()->tipo==0 && $post->ativo == false)
                                        <th class="border px-4 py-2">Trancado</th>
                                    @elseif(Auth::user()->tipo == 1)
                                        <th class="border px-8 py-2">

                                            <!-- botão para trancar -->
                                            @if ($post->ativo == true)
                                                <form action="/trancar/{{ $post->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Trancar</button>
                                                </form>
                                            <!-- botão para destrancar -->
                                            @elseif($post->ativo == false)
                                                <form action="/destrancar/{{ $post->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                                    <button type="submit"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Destrancar</button>
                                              </form>
                                            @endif
                                        </th>
                                    @endif
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</x-app-layout>
