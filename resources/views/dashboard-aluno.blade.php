<x-app-layout>
    <x-slot name="header">

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
                                <th class="px-4 py-2">professor</th>
                                <th class="px-4 py-2">quantidade Topicos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!is_null($subforuns))
                                @foreach ($subforuns as $subforum)

                                    @php 
                                        $professor = App\Models\User::find($subforum->professor_id,);
                                        $quantidade_posts = App\Models\Post::where('subforum_id', $subforum->id)->count();
                                    @endphp

                                    <tr>
                                        <td class="border px-4 py-2"><a href="{{ route('subforum', $subforum->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ $subforum->titulo }}</a></td>
                                        <td class="border px-4 py-2">{{ $subforum->texto }}</td>
                                        <td class="border px-4 py-2">{{$professor->nome}}</td>
                                        <td class="border px-4 py-2">{{$quantidade_posts}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                </div>
            </div>
        </div>
    </div>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</x-app-layout>
