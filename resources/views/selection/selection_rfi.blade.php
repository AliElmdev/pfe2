@extends('layouts.page')
@section('content')
<div>
    <div class="container-fluid">
        <header style="margin-bottom: 3%;margin-top: 2%;"><img src="/assets/img/construction.jpg" style="width: 100%;height: 132.6px;">
            <section style="margin-top: 4%;margin-bottom: 4%;">
                <h2 style="margin-bottom: 2%; color:seagreen;text-align: center; font-weight: bold;">Sélection Base RFI</h2>
                <h3 class="text-dark mb-4" style="text-align: center;">{{$marche->title}}</h3>
                <p style="text-align: center;">{{$marche->description}}</p>
            </section>
        </header>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Listes des entreprises qui ont postuler</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                    <option value="10" selected="">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>&nbsp;</label></div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Entreprise</th>
                                <th style="text-align: center;">Activité</th>
                                <th style="text-align: center;">Bureau</th>
                                <th style="text-align: center;">Badge</th>
                                <th style="text-align: center;">RFI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entreprises as $entreprise)
                                <tr>
                                    <td>{{$entreprise->social_name}}</td>
                                    <td>{{$entreprise->activite_entreprise}}</td>
                                    <td>{{$entreprise->city}}</td>
                                    <td style="text-align: center;"><i class="fa fa-star"></i></td>
                                    <td style="text-align: center;"><a href="{{route('selection_rfi_details',['id_marche'=> $marche->id,'id_entreprise'=>$entreprise->id, 'id_postulation'=>$entreprise->id_postulation])}}"><button class="btn btn-primary" type="button" style="background: rgb(247,61,61);"><i class="fa fa-eye" style="color: rgb(255,255,255);"></i></button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="text-align: center;"><strong>Entreprise<br></strong></td>
                                <td style="text-align: center;"><strong>Activité<br></strong></td>
                                <td style="text-align: center;"><strong>Bureau<br></strong></td>
                                <td style="text-align: center;"><strong>Badge</strong><br></td>
                                <td style="text-align: center;"><strong>RFI</strong></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">1 to 27</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item active"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/themeRfi.js"></script>
@endsection