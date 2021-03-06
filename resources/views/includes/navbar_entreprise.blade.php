<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{route('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="{{route('Marches')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Opportunitéss</span></a>
</li>
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Mon organisation</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mon organisation:</h6>
            <a class="collapse-item" href="{{route('profile',['id' => Auth::user()->id])}}">Mon profil</a>
            <a class="collapse-item" href="#">Organisation</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
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
            <a class="collapse-item" href="{{route('marches_rfi')}}">RFI</a>
            <a class="collapse-item" href="{{route('marches_rfq')}}">RFQ</a>
            <a class="collapse-item" href="{{route('marches_refuser')}}">Refuser</a>
            <a class="collapse-item" href="{{route('marches_gagner')}}">Gagner</a>
            <a class="collapse-item" href="{{route('tous_marches_entreprise')}}">Tous les projets</a>
        </div>
    </div>
</li>