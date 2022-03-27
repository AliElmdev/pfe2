@extends('layouts.dashboard')

@section('navbar')
    @if(Auth::user()->hasRole('chef'))
        @include('includes.navbar_chef')
    @elseif(Auth::user()->hasRole('achat'))
        @include('includes.navbar_achat')
    @elseif(Auth::user()->hasRole('entreprise'))
        @include('includes.navbar_entreprise')
    @endif
@endsection

@section('content')
<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content" style="margin-top: 2%;">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary fw-bold m-0">Mes Marchés</h6>
                            </div>
                            @if(Auth::user()->hasRole('chef'))
                            <div class="card-body">
                                <h4 class="small fw-bold">Marchés en cours<span class="float-end">{{$marchesEnCoursChef}}</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-danger" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                </div>
                                <h4 class="small fw-bold">Marchés fermés<span class="float-end">{{$marchesFermesChef}}</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-warning" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                </div>
                                <h4 class="small fw-bold">Marchés terminés<span class="float-end">{{$marchesTerminesChef}}</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-primary" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                </div>
                                <h4 class="small fw-bold">Tous les marchés<span class="float-end">{{$marchesAllChef}}</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-info" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                </div>
                            </div>
                            @endif

                            @if(Auth::user()->hasRole('achat'))
                            <div class="card-body">
                                <h4 class="small fw-bold">Marchés en cours<span class="float-end">{{$marchesEnCoursAchat}}</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-danger" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                </div>
                                <h4 class="small fw-bold">Marchés fermés<span class="float-end">{{$marchesFermesAchat}}</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-warning" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                </div>
                                <h4 class="small fw-bold">Marchés terminés<span class="float-end">{{$marchesTerminesAchat}}</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-primary" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                </div>
                                <h4 class="small fw-bold">Tous les marchés<span class="float-end">{{$marchesAllAchat}}</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-info" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row mb-3 d-none">
                            <div class="col">
                                <div class="card textwhite bg-primary text-white shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card textwhite bg-success text-white shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 fw-bold">Mes informations</p>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label" for="username"><strong>Nom</strong><br></label>
                                                        <p>{{$user->nom}}</p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label" for="email"><strong>E-mail</strong></label>
                                                        <p>{{$user->email}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 fw-bold">Mon profile</p>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('modifierProfile',['id' => Auth::user()->id])}}">
                                            @csrf
                                            <div class="mb-3"><label class="form-label" for="phone"><strong>Numéro de&nbsp;téléphone</strong></label>
                                                <input class="form-control" type="text" id="phone" value="{{$user->phone}}" name="phone"></div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label" style="font-weight: bold;">Titre/Service<br></label>
                                                        <p>{{$user->service_title}}</p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label" style="font-weight: bold;">Rôle<br></label>
                                                        <p>{{$user->role}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Enregistrer les changements</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-5">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Nous contacter</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form>
                                    <div class="mb-3"><label class="form-label" for="signature"><strong>Message</strong><br></label><textarea class="form-control" id="signature" rows="4" name="signature"></textarea></div>
                                    <div class="mb-3">
                                        <div class="form-check form-switch" style="margin-left: 3%"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"><strong>Avertissez-moi des nouvelles réponses</strong><br></label></div>
                                    </div>
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" style="background: rgb(183,74,50);">Envoyer</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme.js"></script>
@endsection