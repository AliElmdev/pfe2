@extends('chef.dashboard')

@section('contenuDashboardChef')

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
        <script src="/assets/bootstrap/js/bootstrap.min.js">
        </script>
        <script src="/assets/js/themeAchatGestionMarches.js">
        </script>
        @endsection