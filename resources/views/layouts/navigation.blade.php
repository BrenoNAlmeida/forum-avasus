@php 
use Carbon\Carbon;

@endphp
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                @if(Auth::user())
                    @if(Auth::user()->tipo==0)
                    <a href="{{ route('dashboard-aluno') }}">
                        <img alt="shortcut icon" width='100' src={{asset('img/avasus.svg')}}>
                    </a>
                    @elseif (Auth::user()->tipo==1)
                    <a href="{{ route('dashboard-professor') }}">
                        <img alt="shortcut icon" width='100' src={{asset('img/avasus.svg')}}>
                    </a>
                    @elseif (Auth::user()->tipo==2)
                    <a href="{{ route('dashboard-superuser') }}">
                        <img alt="shortcut icon" width='100' src={{asset('img/avasus.svg')}}>
                    </a>
                    @endif
                @else
                    <img alt="shortcut icon" width='100' src={{asset('img/avasus.svg')}}>
                @endif
                </div>

                <!-- Navigation Links -->
                @if(!Auth::user())
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>

                    <x-nav-link :href="route('register-aluno')" :active="request()->routeIs('register-aluno')">
                        {{ __('Cadastro') }}
                    </x-nav-link>
                </div>
                @else
                <!-- nome completo do usuario logado-->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <label class="text-gray-600 font-bold text-lg mt-5">{{ Auth::user()->nome }}</label>
                </div>
                <!-- cpf do usuario logado-->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <label class="text-gray-600 font-bold text-lg mt-5">{{ Auth::user()->cpf }}</label>
                </div>
                <!-- data de nascimento e idade do usuario logado-->
                @php
                    $data = Carbon::parse(Auth::user()->data_nascimento);
                    $data = $data->format('d/m/Y');
                    $idade = Carbon::parse(Auth::user()->data_nascimento)->age;
                    
                @endphp
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <label class="text-gray-600 font-bold text-lg mt-5">{{ $data }} - idade : {{ $idade}} anos</label>
                </div>
                
                @endif

                @if(Auth::user())
                    @if(Auth::user()->tipo == 1)
                <div class="hidden space-x-10 sm:-my-px sm:ml-8 sm:flex">
                 <!--abrir modal novoForum-->
  
                </div>
                    @endif
                @endif
                
            

            </div>

            @if (Auth::user())
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Encerrar sessão') }}
                    </x-dropdown-link>
                </form>
            </div>
            @endif

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @if (Auth::user())
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endif
    </div>
</nav>
