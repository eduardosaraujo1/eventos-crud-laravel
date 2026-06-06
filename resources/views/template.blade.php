<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/style.css" />
    @yield('head')
</head>

<body>
    <nav>
        <a href="{{ route('home') }}" class="nav-logo">Eventos<span>Online</span></a>
        <ul class="nav-links">
            <li><a href="{{ route('quem-somos') }}" class="{{ request()->routeIs('quem-somos') ? 'active' : '' }}">Quem
                    Somos</a></li>
            <li><a href="{{ route('eventos') }}" class="{{ request()->routeIs('eventos') ? 'active' : '' }}">Eventos</a>
            </li>
            <li><a href="{{ route('contato') }}" class="{{ request()->routeIs('contato') ? 'active' : '' }}">Contato</a>
            </li>
            @auth
                <li><a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="btn-nav">Perfil</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn-reset btn-nav-danger">Sair</button>
                </li>
                </form>
            @else

                <li><a href="{{ route('login') }}" class="btn-nav">Login</a></li>
            @endauth
        </ul>
    </nav>
    @yield('content')
</body>

</html>
