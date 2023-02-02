<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <center>
                    <div class="p-6 bg-white border-b border-gray-200 ">
                        REALIZE SEU CADASTRO OU LOGIN
                    </div>
                </center>
            </div>
        </div>
    </div>
 @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</x-app-layout>
