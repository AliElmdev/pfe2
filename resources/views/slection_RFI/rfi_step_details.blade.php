@extends('layouts.page')
@section('content')
<div>
    <div class="container-fluid">
        <header>
            <h3 class="text-dark mb-4" style="text-align: center;margin-top: 3%;">Nom de l'entreprise</h3>
            <div class="card shadow card-rfi">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Informations Entreprise</p>
                </div>
                <div class="card-body">
                    <div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Dénomination sociale<br></h6><span>Dénomination sociale<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Nom Commercial<br></h6><span style="margin-left: 0px;">Dénomination social<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Forme juridique<br></h6><span>Dénomination sociale<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Numéro ICE&nbsp;<br></h6><span>Dénomination sociale<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Numéro SIRET<br></h6><span>Dénomination sociale<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Pays<br></h6><span>Dénomination sociale<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Ville<br></h6><span>Dénomination sociale<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Adresse<br></h6><span>Dénomination sociale<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Code Postal&nbsp;<br></h6><span>Dénomination sociale<br></span>
                        </div>
                        <div class="div-container">
                            <h6 style="font-size: 18px;color: var(--bs-red);font-weight: bold;">Téléphone entreprise (standard)<br></h6><span>Dénomination sociale<br></span>
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
                    <div class="cont">
                        <h6 style="margin-right: 3%;">Copie des statuts de l'entreprise<br></h6><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button>
                    </div>
                    <div class="cont">
                        <h6 style="margin-right: 3%;">Copie de l'attestation d'enregistrement au registre du commerce ou équivalent<br></h6><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button>
                    </div>
                    <div class="cont">
                        <h6 style="margin-right: 3%;">Copie des bilans et CPC certifiés des 3 exercices précédents<br></h6><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button>
                    </div>
                    <div class="cont">
                        <h6 style="margin-right: 3%;">Document avec des références clients sur l'ensemble des activités de l'entreprise<br></h6><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button>
                    </div>
                    <div class="cont">
                        <h6 style="margin-right: 3%;">Certificats ...</h6><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow card-rfi">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"><strong>Réponse de qualification</strong><br></p>
            </div>
            <div class="card-body">
                <div></div>
            </div>
        </div>
        <div class="card shadow card-rfi">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"><strong>Réponse technique</strong><br></p>
            </div>
            <div class="card-body">
                <div></div>
            </div>
        </div>
    </div>
    <div style="text-align: center;margin-top: 5%;margin-bottom: 5%;"><button class="btn btn-primary btn-btn" type="button" style="margin-right: 5%;background: rgb(217,28,28);">Refuser</button><button class="btn btn-primary btn-btn" type="button" style="background: rgb(37,128,15);">Accepter</button></div>
</div>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/themeRfi.js"></script>
@endsection