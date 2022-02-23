<nav class="navbar navbar-light navbar-expand-lg bg-white clean-navbar">
    <div class="container"><img src="assets/img/SST_logo.png" style="width: 86px;"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ route('Home') }}"><strong>accueil</strong></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('Faq') }}">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('Marches') }}">Opportuinities</a></li>
                @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">S'inscrire</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Se connecter</a></li>
                @else 
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Mon Dashboard</a></li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>