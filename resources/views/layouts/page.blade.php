<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="/assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">

    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/css/styleHome.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto">
                <a href="index.html">
                    E-Supply Online<span>.</span>
                </a>
            </h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ route('Home') }}">Acceuil</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('Home') }}#devenirFournisseur">Devenir Fournisseur</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('Home') }}#faq">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('Home') }}#contact">Contact</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('Marches') }}">Opportunités</a></li>
            
            
            @guest
                    <li><a class="nav-link scrollto" href="{{ route('register') }}">S'inscrire</a></li>
                </ul> 
                </nav>
                    <a href="{{ route('login') }}" style="color:white" class="get-started-btn scrollto">Connectez-vous</a>
            @else  
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">tableau de bord </a></li>
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
                </ul>
            </nav>
            @endguest
        </div>
    </header>
    @yield('content')
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>ESO<span>.</span></h3>
                        <br> Km 5, Rue d'Agouray، N6<br> Meknes 50040<br> Maroc <br><br>
                        <strong>Téléphoner:</strong> <br> +212 5354 67085 <br> +212 6000 00000 <br>
                        <strong>E-mail:</strong> <br> info@eso.com<br> contact@eso.com <br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Liens utiles</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('Home') }}">Acceuil</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('Home') }}#devenirFournisseur">Devenir Fournisseur</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('Marches') }}">Opportunités</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('Home') }}#faq">FAQ</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('Home') }}#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>ESO</span></strong>. Tous les droits sont réservés
                </div>
            </div>
        </div>
    </footer>
    </main>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="/assets/js/script.min.js"></script>
    <script src="/assets/js/Table-With-Search.js"></script>
    <script src="/assets/vendor/purecounter/purecounter.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>