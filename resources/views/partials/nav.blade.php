<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('inici') }}">Blog Laravel</a>
        
        <div class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('inici') ? 'active' : '' }}" 
                   href="{{ route('inici') }}">Inici</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}" 
                   href="{{ route('posts.index') }}">Posts</a>
            </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('posts.create') ? 'active' : '' }}" 
                       href="{{ route('posts.create') }}">Crear Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Eixir ({{ auth()->user()->login }})</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" 
                       href="{{ route('login') }}">Entrar</a>
                </li>
            @endauth
        </div>
    </div>
</nav>