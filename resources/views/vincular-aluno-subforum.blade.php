<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vincular alunos') }}

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
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alunos as $aluno)
                                @php
                                    $vinculado = App\Models\UserSubforum::where('user_id', $aluno->id)
                                        ->where('subforum_id', $subforum)
                                        ->exists();
                                    //dd($vinculado);
                                @endphp
                                <tr>
                                    <td class="border px-4 py-2">{{ $aluno->nome }}</a></td>
                                    <td class="border px-4 py-2">{{ $aluno->cpf }}</td>
                                    <td class="border px-4 py-2">
                                        @if (!$vinculado)
                                            <form action="{{ route('vincular') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="subforum" value="{{ $subforum }}">
                                                <input type="hidden" name="aluno" value="{{ $aluno->id }}">
                                                <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">vincular</button>
                                       
                                            </form>
                                        @else
                                        <!--form para desvincular-->
                                            <form action="{{ route('desvincular') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="subforum" value="{{ $subforum }}">
                                                <input type="hidden" name="aluno" value="{{ $aluno->id }}">
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">desvincular</button>
                                            </form>
                                         @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</x-app-layout>
