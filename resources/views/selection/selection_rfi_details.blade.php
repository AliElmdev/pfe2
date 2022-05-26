@extends('layouts.dashboard')

@section('navbar')

@endsection

@section('content')
<div>
    <div class="container-fluid">
        <header>
            <h3 class="text-dark mb-4" style="text-align: center;margin-top: 3%;">{{$marche->title}}</h3>
            <div class="card shadow card-rfi">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Informations Entreprise</p>
                </div>
                <div class="card-body">
                    <div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Dénomination sociale<br></h6><span>{{$entreprise->social_name}}<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Nom Commercial<br></h6><span style="margin-left: 0px;">{{$entreprise->commercial_name}}<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Forme juridique<br></h6><span>{{$entreprise->company_type}}<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Numéro ICE&nbsp;<br></h6><span>{{$entreprise->ice_num}}<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Numéro SIRET<br></h6><span>{{$entreprise->siret_num}}<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Pays<br></h6><span>{{$entreprise->country}}<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Ville<br></h6><span>{{$entreprise->city}}<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Adresse<br></h6><span>{{$entreprise->adresse}}<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Code Postal&nbsp;<br></h6><span>{{$entreprise->zip_code}}<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Téléphone entreprise (standard)<br></h6><span>{{$entreprise->phone}}<br></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="card shadow card-rfi">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Fichiers Entreprises</p>
            </div>
            <div class="card-body">
                <div>
                    <div class="cont">
                        <h6 style="margin-right: 3%;">Document CAU<br></h6><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow card-rfi">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"><strong>Réponse de qualification</strong><br></p>
            </div>
            <div class="card-body">
                <div>
                    <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;"> 1.1 Dossier Fournisseur - Données Saisies - Section avec questions VM<br></h6>
                    @foreach ($reponses_section1 as $qr)
                        <strong>{{$qr->question}}</strong><br>
                        @if ($qr->type == 'f')
                            <a href="{{$qr->reponse}}" download="{{$qr->reponse}}"><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button></a> 
                        @else
                            <p>{{$qr->reponse}}</p>
                        @endif
                    @endforeach
                </div>
                <div>
                    <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;"> 1.2 Dossier Fournisseur - Pièces jointes - Section avec questions VM<br></h6>
                    @foreach ($reponses_section2 as $qr)
                        <strong>{{$qr->question}}</strong><br>
                        @if ($qr->type == 'f')
                            <a href="{{$qr->reponse}}" download="{{$qr->reponse}}"><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button></a> 
                        @else
                            <p>{{$qr->reponse}}</p>
                        @endif
                    @endforeach
                </div>
                <div>
                    <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;"> 1.3 Management HSE- section avec VM<br></h6>
                    @foreach ($reponses_section3 as $qr)
                        <strong>{{$qr->question}}</strong><br>
                        @if ($qr->type == 'f')
                            <a href="{{$qr->reponse}}" download="{{$qr->reponse}}"><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button></a> 
                        @else
                            <p>{{$qr->reponse}}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card shadow card-rfi">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"><strong>Réponse technique</strong><br></p>
            </div>
            <div class="card-body">
                <div>
                    <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;"> 2.1  SITUATION FINANCIAIRE <br></h6>
                    @foreach ($reponses_section4 as $qr)
                        <strong>{{$qr->question}}</strong><br>
                        @if ($qr->type == 'f')
                            <a href="{{$qr->reponse}}" download="{{$qr->reponse}}"><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button></a> 
                        @else
                            <p>{{$qr->reponse}}</p>
                        @endif
                    @endforeach
                </div>
                <div>
                    <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;"> 2.2 EXPERIENCE ET REFERENCES  <br></h6>
                    @foreach ($reponses_section5 as $qr)
                        <strong>{{$qr->question}}</strong><br>
                        @if ($qr->type == 'f')
                            <a href="{{$qr->reponse}}" download="{{$qr->reponse}}"><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button></a> 
                        @else
                            <p>{{$qr->reponse}}</p>
                        @endif
                    @endforeach
                </div>
                <div>
                    <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;"> 2.3 CERTIFICATION <br></h6>
                    @foreach ($reponses_section6 as $qr)
                        <strong>{{$qr->question}}</strong><br>
                        @if ($qr->type == 'f')
                            <a href="{{$qr->reponse}}" download="{{$qr->reponse}}"><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button></a> 
                        @else
                            <p>{{$qr->reponse}}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div style="display: flex; flex-direction:row; flex-wrap:wrap; margin-top:3%; margin-bottom:3%; margin-left:35%;">
        <form style="margin-right: 2%;" action="{{route('selection_rfi_refuse',['id_marche' => $marche->id, 'id_entreprise' => $entreprise->id,'id_postulation'=> $postulation->id])}}" method="GET">
            <input type="hidden" name="id_postulation" value="{{$postulation->id}}">
            <input type="hidden" name="id_marche" value="{{$marche->id}}">
            <button class="btn btn-primary btn-btn" type="submit" style="margin-right: 5%;background: rgb(217,28,28);">Refuser</button>
        </form>
        <form action="{{route('selection_rfi_accept',['id_marche' => $marche->id, 'id_entreprise' => $entreprise->id,'id_postulation'=> $postulation->id])}}" method="GET">
            <input type="hidden" name="id_postulation" value="{{$postulation->id}}">
            <input type="hidden" name="id_marche" value="{{$marche->id}}">
            <button class="btn btn-primary btn-btn" type="submit" style="background: rgb(37,128,15);">Accepter</button>
        </form>
    </div>
</div>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/themeRfi.js"></script>
@endsection