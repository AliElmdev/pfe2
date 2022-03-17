@extends('layouts.dashboard')
@section('navbar')


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
    <a class="nav-link" href="charts.html">
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
            <a class="collapse-item" href="{{route('create_project')}}">Créer un nouveau projet</a>
            <a class="collapse-item" href="utilities-color.html">En cours</a>
            <a class="collapse-item" href="utilities-border.html">Terminer</a>
            <a class="collapse-item" href="utilities-border.html">Tous les projets</a>
            <a class="collapse-item" href="{{route('chats_chef')}}">Message</a>
        </div>
    </div>
</li>

@endsection

@section('title')

@endsection

@section('content')


<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-uppercase text-primary m-0 fw-bold" style="text-align: center;">Messages
                            marche {{$id_marche}}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"
                                    class="chosen form-select">
                                    <label class="form-label text-uppercase">Afficher&nbsp;&nbsp;
                                        <select class="d-inline-block form-select form-select-sm"
                                            onchange="filtrage(this)">
                                            <option value="all" selected></option>
                                            <option value="NON">Non vue</option>
                                            <option value="OUI">Vue</option>
                                        </select>&nbsp;</label>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info"
                                style="border-radius: 10px;border-width: 1px;border-style: solid;">
                                <table class="table my-0" id="dataTable">
                                    <thead style="text-align: center;background: #93d1e4;">
                                        <tr>

                                            <th>Nom Entreprise</th>
                                            <th>Etat d'entreprise </th>
                                            <th class="text-capitalize">Nombre De message</th>
                                            <th>Description</th>
                                            <th style="width: 10%;">Contacter<br></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($list_messages_vue as $item)
                                        <tr style="text-align: center;" class="message_vue">
                                            <td>{{$item->social_name}}</td>
                                            <td>{{$item->etat}}</td>
                                            <td>{{$item->total}}</td>
                                            <td>Message vue</td>

                                            <td style="width: 10%;"><a
                                                    href={{route('chat_chef_entreprise',[$id_marche,$item->entreprise_id])}}>
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="bi bi-envelope"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="21" fill="currentColor"
                                                                style="padding-left: 3px" class="bi bi-envelope"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                            </svg></i></button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($list_messages_non_vue as $item)
                                        <tr style="text-align: center;" class="message_non_vue">
                                            <td>{{$item->social_name}}</td>
                                            <td>{{$item->etat}}</td>
                                            <td>{{$item->total}}</td>
                                            <td>Message non vue</td>
                                            <td style="width: 10%;"><a
                                                    href={{route('chat_chef_entreprise',[$id_marche,$item->entreprise_id])}}>
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="bi bi-envelope"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="21" fill="currentColor"
                                                                style="padding-left: 3px" class="bi bi-envelope"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                            </svg></i></button></a>
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
    <script>
        function filtrage(selectObject) {
                var value = selectObject.value;
                $("*[class*='message']").hide();
                if(value=='NON'){
                    $("*[class*='message_no']").show();
                }else if(value=='OUI'){
                    $("*[class*='message_v']").show();
                }else{
                    $("*[class*='message_']").show();
                }
            }
        
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    @endsection