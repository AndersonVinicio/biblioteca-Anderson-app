<nav>
    

    <div>
        <div>
            <div>
                @auth
                  {{-- MOSTARMOS LOS ENLACES A LOS USUAROS ATUTENTIFICADOS --}}
                  <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('HOME') }}
                  </x-nav-link>
                @else
                    {{-- EN CASO QUE EL USUARIO NO ESTE IDENTIFICADO --}}
                  <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('Log in') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                  </x-nav-link>
                @endauth
            </div>
        </div>
    </div>
    {{-- <ul>
        <li><a href="/libros">LIBROS</a></li>
        <li><a href="/prestamos">PRESTAMOS</a></li>

    </ul> --}}
</nav>