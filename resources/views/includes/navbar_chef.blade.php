
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{route('statistics_chef')}}">
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

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Mes Projets</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mes projets:</h6>
            <a class="collapse-item" href="{{route('create_project')}}">Créer un nouveau projet</a>
            <a class="collapse-item" href="{{route('marches_en_cours_chef',['id_chef' => Auth::user()->id])}}">Marchés en cours</a>
            <a class="collapse-item" href="{{route('marches_fermes_chef',['id_chef' => Auth::user()->id])}}">Marchés fermés</a>
            <a class="collapse-item" href="{{route('marches_termines_chef',['id_chef' => Auth::user()->id])}}">Marchés terminés</a>
            <a class="collapse-item" href="{{route('tous-marches_chef',['id_chef' => Auth::user()->id])}}">Tous les marchés</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Page d'acceuil</span></a>
</li>