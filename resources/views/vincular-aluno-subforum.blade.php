<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('vincular aluno') }}
            
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- tabela com os subforuns associados ao aluno-->
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nome</th>
                                <th class="px-4 py-2">CPF</th>
                                <th class="px-20 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alunos as $aluno)

                                @php 
                                    $subforum = App\Models\Subforum::where('id', $subforum)->first();
                                    $idAluno = $aluno->id;
                                    $idSubforum = $subforum->id;
                                    //dd(gettype($subforum));
                                @endphp


                                <tr>
                                    <td class="border px-4 py-2">{{ $aluno->nome }}</a></td>
                                    <td class="border px-4 py-2">{{ $aluno->cpf}}</td>
                                    <td class="border px-4 py-2">
                                    <td>
                                        <a href="{{ route('vincular', [$idAluno, $idSubforum]) }}">Link</a>
 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</x-app-layout>