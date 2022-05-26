<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{route('dashboard')}}">
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
            <a class="collapse-item" href="{{route('users')}}">Tous les utilisateurs</a>
            <a class="collapse-item" href="{{route('create_user')}}">Créer un Nouvel Utilisateur</a>
            {{-- <a class="collapse-item" href="#">Chefs de projet</a>
            <a class="collapse-item" href="#">Responsables d'achat</a> --}}
            <a class="collapse-item" href="{{route('entreprises')}}">Entreprises</a>
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
            <a class="collapse-item" href="{{route('RolePermissionEdit')}}">Roles/Permission</a>
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
            <a class="collapse-item" href="{{route('marches_en_cours_admin')}}">En cours</a>
            <a class="collapse-item" href="{{route('marches_termines_admin')}}">Terminer</a>
            <a class="collapse-item" href="{{route('marches_fermes_admin')}}">Annuler</a>
            <a class="collapse-item" href="{{route('tous_marches_admin')}}">Tous les projets</a>
            {{-- <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a> --}}
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="{{route('Statistique')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Statistiques</span></a>
</li>