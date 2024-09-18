<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('front/img/logo.webp') }}" alt="logo Casserole en folie" width="auto" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Accueil</a>
                    </li>
                    
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link button btn-primary btn-block" href="{{ url('/login') }}">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill btn btn-warning" href="{{ url('/register') }}">Créer un compte</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
</header>
