@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_entreprise')

@endsection

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
    integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')

<body id="page-top" style="font-family: Roboto, sans-serif;border-color: rgb(159,159,159);">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-uppercase text-primary m-0 fw-bold" style="text-align: center;">Boite
                                Messages
                            </p>
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
                                                <option value="pos">marche postule</option>
                                            </select>&nbsp;</label><br>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info"
                                    style="border-radius: 10px;border-width: 1px;border-style: solid;">
                                    <table class="table my-0" id="dataTable">
                                        <thead style="text-align: center;background: #93d1e4;">
                                            <tr>
                                                <th>Marché_id</th>
                                                <th>Nom de marche</th>
                                                <th>Date limite</th>
                                                <th class="text-capitalize">Nombre De message</th>
                                                <th>Description</th>
                                                <th style="width: 10%;">Accéder<br></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($list_messages_vue as $item)

                                            <tr style="text-align: center;" class="message_vue">
                                                <td>{{$item->id_marche}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{ ($item->limit_date)}}</td>
                                                <td>{{$item->total}}</td>
                                                <td>Message vue</td>
                                                <td style="width: 10%;"><a href={{route('chats',$item->id_marche)}}>
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fa fa-eye"></i></button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @foreach ($list_messages_non_vue as $item)
                                            <tr style="text-align: center;" class="message_non_vue">
                                                <td>{{$item->id_marche}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{ ($item->limit_date)}}</td>
                                                <td>{{$item->total}}</td>
                                                <td>Message non vue</td>
                                                <td style="width: 10%;">
                                                    <a href={{route('chats',$item->id_marche)}}>
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fa fa-eye"></i></button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @foreach ($list_messages_postuler as $item)
                                            <tr style="text-align: center;" class="message_pos">
                                                <td>{{$item->id_marche}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{ ($item->limit_date)}}</td>
                                                <td>0</td>
                                                <td>Marches postulée</td>
                                                <td style="width: 10%;">
                                                    <a href={{route('chats',$item->id_marche)}}>
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fa fa-eye"></i></button></a>
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
                $("*[class*='message_']").hide();
                var value = selectObject.value;
                if(value=='NON'){
                    $("*[class*='message_non']").show();
                }else if(value=='pos'){
                    $("*[class*='message_pos']").show();
                }else if(value=='OUI'){
                    $("*[class*='message_vue']").show();
                }else{
                    $("*[class*='message_']").show();
                }
            }
        
        </script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/js/themeAchatGestionMarches.js"></script>
        @endsection