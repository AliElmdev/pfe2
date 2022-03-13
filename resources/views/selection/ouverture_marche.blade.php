@extends('layouts.dashboard')

@section('navbar')

@endsection


@section('content')
<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <header style="text-align: center;--bs-primary: #4e73df;--bs-primary-rgb: 78,115,223;background: #1cc88a;padding: 3%;margin: 2%;border-radius: 3px;">
                <h1 style="color: rgb(255,255,255);font-weight: bold;">{{$marche->title}}</h1>
                <p style="color: rgb(255,255,255);">{{$marche->description}}</p>
                <a href="{{$marche->c_charge}}"><button class="btn btn-primary" id="ch" type="button" style="border-width: 1px;border-color: rgb(255,255,255);background: #1cc88a;"><i class="fa fa-download" style="margin-right: 5px;"></i>Cahier de charge</button></a>
            </header>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4"><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" style="background: var(--bs-red);"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Générer un rapport</a></div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Postulations</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span>$40,000</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>RFI</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span>$215,000</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Technique</span></div>
                                        <div class="row g-0 align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark fw-bold h5 mb-0 me-3"><span>50%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Commercial</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span>18</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary fw-bold m-0">Ouverture du marché</h6>
                            </div>
                            <div class="card-body">
                                <div style="border: 1px solid #4e73df;border-radius: 3px;padding: 3%;margin-bottom: 2%;">
                                    <h4 class="small fw-bold">Sélection RFI<span class="float-end" style="color: var(--bs-red);">Etat</span></h4><button class="btn btn-primary goTo" data-bss-hover-animate="rubberBand" type="button" style="background: rgb(255,255,255);color: #4e73df;">Ouvrir<i class="far fa-arrow-alt-circle-right" style="margin-left: 5px;"></i></button>
                                </div>
                                <div style="border: 1px solid #4e73df;border-radius: 3px;padding: 3%;margin-bottom: 2%;">
                                    <h4 class="small fw-bold">Sélection Technique<span class="float-end" style="color: var(--bs-red);">Etat</span></h4><button class="btn btn-primary goTo" data-bss-hover-animate="rubberBand" type="button" style="background: rgb(255,255,255);color: #4e73df;">Ouvrir<i class="far fa-arrow-alt-circle-right" style="margin-left: 5px;"></i></button>
                                </div>
                                <div style="border: 1px solid #4e73df;border-radius: 3px;padding: 3%;margin-bottom: 2%;">
                                    <h4 class="small fw-bold">Sélection Commerciale<span class="float-end" style="color: var(--bs-red);">Etat</span></h4><button class="btn btn-primary goTo" data-bss-hover-animate="rubberBand" type="button" style="background: rgb(255,255,255);color: #4e73df;">Ouvrir<i class="far fa-arrow-alt-circle-right" style="margin-left: 5px;"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary fw-bold m-0">Progression du marché</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row align-items-center no-gutters" style="margin-bottom: 1%;">
                                        <div class="col me-2">
                                            <h6 class="mb-0"><strong>Étape Sélection&nbsp;RFI</strong></h6>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4"></label></div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center no-gutters" style="margin-bottom: 1%;">
                                        <div class="col me-2">
                                            <h6 class="mb-0"><strong>Étape Sélection Technique</strong><br></h6>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5"></label></div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center no-gutters" style="margin-bottom: 1%;">
                                        <div class="col me-2">
                                            <h6 class="mb-0"><strong>Étape&nbsp;sélection Commerciale</strong><br></h6>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3"></label></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/bs-init.js"></script>
<script src="/assets/js/theme.js"></script>
@endsection