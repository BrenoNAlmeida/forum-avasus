<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Aluno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- table com os posts associados ao aluno-->
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Titulo</th>
                                <th class="px-4 py-2">nome do autor</th>
                                <th class="px-4 py-2">quantidade de respostas</th>
                                <th class="px-4 py-2">data da criação</th>
                                <th class="px-4 py-2">data da ultima resposta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                @php 
                                    $professor = App\Models\User::find($post->professor_id,);
                                    $quantidade_posts = App\Models\Post::where('subforum_id', $post->id)->count();
                                @endphp
                                <tr>
                                    <td class="border px-4 py-2"><a href="{{ route('dashboard', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ $post->titulo }}</a></td>
                                    <td class="border px-4 py-2">{{ $post->texto }}</td>
                                    <td class="border px-4 py-2">{{$professor->nome}}</td>
                                    <td class="border px-4 py-2">{{$quantidade_posts}}</td>
                                </tr>
                            @endforeach
                        </tbody>
            </div>
        </div>
    </div>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</x-app-layout>