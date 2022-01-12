@extends('layouts.dashboard')
@section('navbar')
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Utilisateurs</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Les utilisateurs:</h6>
            <a class="collapse-item" href="#">Chefs de projet</a>
            <a class="collapse-item" href="#">Responsables d'achat</a>
            <a class="collapse-item" href="#">Entreprises</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Gestion</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion:</h6>
            <a class="collapse-item" href="utilities-color.html">Roles</a>
            <a class="collapse-item" href="utilities-border.html">Permission</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Projets</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Les Projets:</h6>
            <a class="collapse-item" href="#">En cours</a>
            <a class="collapse-item" href="#">Terminer</a>
            <a class="collapse-item" href="#">Annuler</a>
            <a class="collapse-item" href="#">Tous les projets</a>
            {{-- <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a> --}}
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Statistiques</span></a>
</li>


@endsection

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Table de Bord</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" style="background: #b92525;"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Télécharger un raport</a>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="font-size: 16px;color: rgb(248,20,20);">CONTRATS EN NÉGOCIATION</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>......</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-address-book fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span style="font-size: 16px;">Marché en attend</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>....</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-business-time fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span style="font-size: 16px;">mes questionnaire en cours</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>...</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-question-circle fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span style="font-size: 16px;color: rgb(75,103,249);">(Autres)</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>Contenu</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-star-half-alt fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection