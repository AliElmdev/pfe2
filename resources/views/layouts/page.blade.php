<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
</head>

<body>
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
    @yield('content')
        <footer class="footer-clean" style="background: rgb(235,235,235);">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Notre Groupe</h3>
                        <ul>
                            <li><a href="#"><img src="assets/img/saraweb3d.png" style="width: 49px;">Sara Web</a></li>
                            <li style="margin-top: 6px;"><a href="#"><img src="assets/img/securiter-dabord-logo.png" style="width: 49px;">Sécurité D'abord</a></li>
                            <li><a href="#"><img src="assets/img/blue%20logo.png" style="width: 49px;">True Work</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Guides et Videos</h3>
                        <ul>
                            <li><a href="#">Inscription</a></li>
                            <li><a href="#">Utilisation</a></li>
                            <li><a href="#">Problems</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Contact</h3>
                        <ul>
                            <li><a href="#">Pour toute demande d'information complémentaire CONTACTEZ-NOUS !</a></li>
                            <li><a href="#">0606060606</a></li>
                            <li><a href="#">Temp@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>