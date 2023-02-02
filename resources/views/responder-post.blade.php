<x-app-layout>
    <x-slot name="header" class="flex justify-between">

        <section x-data="{ modalopen: false }">
            <section x-show="modalopen" class="w-screen fixed flex itens-center justify-center">
                <div class="rounded w-72 p-4 bg-white shadow mt-4">
                    <div>
                        <form method="POST" action="/cadastrar-resposta">
                            @csrf
                            <!-- resposta -->
                            <div>
                                <x-label for="texto" :value="__('texto')" />

                                <x-input id="texto" class="block mt-1 w-full" type="text" name="texto"
                                    :value="old('texto')" required autofocus />
                            </div>
                            <input type="hidden" name="aluno_id" value="{{Auth::user()->id}}">
                            
                            <input type="hidden" name="post_id" value="{{$post->id}}">

                            <div class="col-sm-10">
                                <button type="submit"
                                    class=" mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded ">Salvar</button>
                            </div>
                        </form>
                    </div>
                    <button class=" mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded "
                        @click="modalopen = false">Cancelar</button>
                </div>
            </section>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded"
                @click="modalopen = true">responder Topico
            </button>
        </section>
    </x-slot>
    <!-- separar as tabelas -->
    <div>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- tabela com os subforuns associados ao aluno-->
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Topico</th>
                                    <th class="px-4 py-2">Autor</th>
                                    <th class="px-4 py-2">texto</th>
                                    <th class="px-4 py-2">Data criação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $autor = App\Models\User::where('id', $post->aluno_id)->first();
                                @endphp
                                <tr>
                                    <td class="border px-4 py-2">{{ $post->titulo }}</a></td>
                                    <td class="border px-4 py-2">{{ $autor->nome}}</td>
                                    <td class="border px-6 py-2">{{ $post->texto }}</td>
                                    <td class="border px-6 py-2">{{ $post->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- tabela com os subforuns associados ao aluno-->
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Autor</th>
                                <th class="px-4 py-2">Resposta</th>
                                <th class="px-4 py-2">data de criação</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($respostas as $resposta)
                                @php
                                    $autor = App\Models\User::where('id', $resposta->aluno_id)->first();
                                    if ($autor->nome_social == null) {
                                        $autor = $autor->nome;
                                    } else {
                                        $autor = $autor->nome_social;
                                    } 
                                @endphp

                                <tr>
                                    <th class="border px-4 py-2">{{ $autor}}</th>
                                    <th class="border px-4 py-2">{{ $resposta->texto }}</th>
                                    <th class="border px-4 py-2">{{ $resposta->created_at }}</th>
                                    <!-- botão para responder -->
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</x-app-layout>
