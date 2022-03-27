@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_entreprise')

@endsection

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
<div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-uppercase text-primary m-0 fw-bold">Tous les marchés<br></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label text-uppercase">Afficher&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Chercher"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Marché</th>
                                            <th>Domaine</th>
                                            <th>Catégorie</th>
                                            <th class="text-capitalize">état</th>
                                            <th style="width: 10%;">Accéder<br></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($marches as $marche)
                                            <tr>
                                                <td>{{$marche->title}}</td>
                                                <td>{{$marche->domaine}}</td>
                                                <td>{{$marche->categorie}}</td>
                                                @if ($marche->etat == 1)
                                                    <td>Non Lancer</td>
                                                @elseif($marche->etat ==  2)
                                                    <td>Lancer</td>
                                                @elseif($marche->etat>=3 AND $marche->etat<=5)
                                                    <td>Fermé</td>
                                                @elseif($marche->etat == 6)
                                                    <td>Terminé</td>
                                                @endif
                                                <td style="width: 10%;"><a href="{{route('postulation',$marche->id)}}"><button class="btn btn-primary" type="button"><i class="fa fa-eye"></i></button></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Accéder<br></strong></td>
                                            <td><strong>Domaine<br></strong></td>
                                            <td><strong>Catégorie<br></strong></td>
                                            <td><strong>État<br></strong></td>
                                            <td><strong style="width: 10%;">Accéder<br></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">1 à 10 de 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/themeAchatGestionMarches.js"></script>
@endsection