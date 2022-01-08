@extends('layout.page')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
            <div class="container-fluid">
                <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                <h6 class="dropdown-header" style="background: #b92525;">Notifications</h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div>
                                        <span class="small text-gray-500">December 12, 2022</span>
                                        <p>Notification 1</p>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div>
                                        <span class="small text-gray-500">December 7, 2022</span>
                                        <p>Notification 2</p>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div>
                                        <span class="small text-gray-500">December 2, 2019</span>
                                        <p>Notification 3</p>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Afficher tous les notifications</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                <h6 class="dropdown-header" style="background: #b92525;">Nouveaux Messages</h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="fw-bold">
                                        <div class="text-truncate"><span>Contenu de message ...</span></div>
                                        <p class="small text-gray-500 mb-0">Responsable 1&nbsp; - 58m</p>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="fw-bold">
                                        <div class="text-truncate"><span>Contenu de message...</span></div>
                                        <p class="small text-gray-500 mb-0">Responsable 2 - 1h</p>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="fw-bold">
                                        <div class="text-truncate"><span>Contenu de message...</span></div>
                                        <p class="small text-gray-500 mb-0">Responsable 3 - 2j</p>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="fw-bold">
                                        <div class="text-truncate"><span>Contenu de message...</span></div>
                                        <p class="small text-gray-500 mb-0">Responsable 4 · 2sem</p>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Afficher tous les messages</a>
                            </div>
                        </div>
                        <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                    </li>
                    <div class="d-none d-sm-block topbar-divider"></div>
                    <li class="nav-item dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="color: rgb(249, 23, 9); font-style: italic; font-weight: bold;">Nom utilisateur</a>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Se déconnecter</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
@endsection