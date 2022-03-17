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
                                <div class="col-md-6">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"
                                        class="chosen form-select">
                                        <label class="form-label text-uppercase">Filtrer&nbsp;&nbsp;
                                            <select class="d-inline-block form-select form-select-sm"
                                                onchange="filtrage(this)">
                                                <option value="all" selected></option>
                                                @foreach ($list_etat_marches as $item)
                                                <option value={{$item->id}}>{{$item->description}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info"
                                    style="border-radius: 10px;border-width: 1px;border-style: solid;">
                                    <table class="table my-0" id="dataTable">
                                        <thead style="text-align: center;background: #93d1e4;">

                                            <tr>

                                                <th>Nom</th>
                                                <th>Description</th>
                                                <th>Etat </th>
                                                <th>Date affichage</th>
                                                <th> Date limite</th>
                                                <th style="width: 10%;">Accéder</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($list_marches as $item)
                                            <tr style="text-align: center;" class={{$item->etat_num}} class
                                                ="marches">
                                                <td>{{$item->titre}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->etat}}</td>
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
        <script>
            function filtrage(selectObject) {
                var value = selectObject.value;
                $("*[class*='marches_]").hide();
                if(value=='all'){
                    $("*[class*='marches']").show();
                }else if(value=='1'){
                    $("*[class*='1']").show();
                }else if(value=='2'){
                    $("*[class*='2']").show();
                }else if(value=='3'){
                    $("*[class*='marches_3']").show();
                }else if(value=='4'){
                    $("*[class*='marches_4']").show();
                }else if(value=='5'){
                    $("*[class*='marches_5']").show();
                }else if(value=='6'){
                    $("*[class*='marches_6']").show();
                }}
               
        </script>

        <script src="/assets/bootstrap/js/bootstrap.min.js">
        </script>
        <script src="/assets/js/themeAchatGestionMarches.js">
        </script>
        @endsection