@extends('layouts.dashboard')

@section('navbar')
@if(Auth::user()->hasRole('chef'))
<li class="nav-item">
    <a class="nav-link" href="/statistics">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="{{route('profile',['id' => Auth::user()->id])}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Mon compte</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('chats_chef')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Message</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
        aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Mes Projets</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mes projets:</h6>
            <a class="collapse-item" href="{{route('create_project')}}">Créer un nouveau projet</a>
            <a class="collapse-item" href="{{route('marches_en_cours_chef',['id_chef' => Auth::user()->id])}}">Marchés
                en cours</a>
            <a class="collapse-item" href="{{route('marches_fermes_chef',['id_chef' => Auth::user()->id])}}">Marchés
                fermés</a>
            <a class="collapse-item" href="{{route('marches_termines_chef',['id_chef' => Auth::user()->id])}}">Marchés
                terminés</a>
            <a class="collapse-item" href="{{route('tous-marches_chef',['id_chef' => Auth::user()->id])}}">Tous les
                marchés</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Page d'acceuil</span></a>
</li>

@endif

@if(Auth::user()->hasRole('achat'))
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="{{route('profile')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Mon compte</span></a>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
        aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Mes Projets</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mes projets:</h6>
            <a class="collapse-item" href={{route('marcheEnCoursCreation')}}>En cours de creation</a>
            <a class="collapse-item" href={{route('marchesAchat')}}>En cours</a>
            <a class="collapse-item" href={{route('marchesAchatEnCours')}}>Terminer</a>
            <a class="collapse-item" href={{route('marchesAchatTerminer')}}>Tous les projets</a>
        </div>
    </div>
</li>

@endif


@endsection

@section('content')

<body id="page-top" style="font-family: Roboto, sans-serif;border-color: rgb(159,159,159);">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-uppercase text-primary m-0 fw-bold" style="text-align: center;">Marches
                                Informations
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info"
                                    style="border-radius: 10px;border-width: 1px;border-style: solid;">
                                    <table class="table my-0" id="dataTable">
                                        <thead style="text-align: center;background: #93d1e4;">

                                            <tr>

                                                <th>Nom</th>
                                                <th>Description</th>
                                                <th>Etat </th>
                                                <th>Categorie</th>
                                                <th>Date affichage</th>
                                                <th> Date limite</th>
                                                <th style="width: 10%;">Accéder</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($marches as $item)
                                            <tr style="text-align: center;">
                                                <td>{{$item->titre}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->etat}}</td>
                                                <td>{{$item->categ}}</td>
                                                <td>{{$item->date_affichage}}</td>
                                                <td>{{$item->date}}</td>
                                                <td style="width: 10%;">
                                                    <a href={{route('modifierMarche',$item->id)}}>
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/theme.js"></script>
        @endsection