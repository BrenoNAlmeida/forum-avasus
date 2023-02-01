<x-app-layout>
    <x-slot name="header">

         <section x-data="{ modalopen: false}">
        <section x-show="modalopen" class="w-screen fixed flex itens-center justify-center">
            <div class="rounded w-72 p-4 bg-white shadow mt-4">
                <div>
                    <form method="POST" action="/cadastrar-subforum">
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

                                @php
                                    $opcoes = App\Models\Categoria::all();
                                @endphp

                                <div class="relative">
                                    <p>Categoria</p>
                                    <select name="categoria_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="">Selecione uma Categoria</option>
                                        @foreach ($opcoes as $opcao)
                                            <option value="{{ $opcao->id }}" {{ old('nome_do_campo') == $opcao->id ? 'selected' : '' }}>{{ $opcao->nome }}</option>
                                        @endforeach
                                    </select>
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293l-3. 3 3. 3a1 1 0 0 1-1. 4 1. 4L2. 5 8. 3a1 1 0 0 1 0 1. 4l4. 6a1 1 0 0 1-1. 4 1. 4l-3. 3 3. 3a1 1 0 0 1-1. 4-1. 4l-4" /></svg>
                                    </div>

                                <div class="col-sm-10">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded">Salvar</button>
                                </div>
                        </form>
                        
                    </div>
                    <button class=" mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded " style="float: ri" @click="modalopen = false">Cancelar</button>
                </div>
            </section>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded" @click="modalopen = true">Criar novo subforum</button>
        </section>


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
                                <th class="px-4 py-2">Descrição</th>
                                <th class="px-20 py-2">professor responsavel</th>
                                <th class="px-6 py-2">Quantidade de Topicos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subforuns as $subforum)

                                @php 
                                
                                    $professor = App\Models\User::find($subforum->professor_id,);
                                    $quantidade_posts = App\Models\Post::where('subforum_id', $subforum->id)->count();
                                @endphp


                                <tr>
                                    <td class="border px-4 py-2"><a href="{{ route('detalhes-subforum', $subforum->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ $subforum->titulo }}</a></td>
                                    <td class="border px-4 py-2">{{ $subforum->texto }}</td>
                                    <td class="border px-6 py-2">{{ $professor->nome}}</td>
                                    <td class="border px-6 py-2">{{ $quantidade_posts }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</x-app-layout>
