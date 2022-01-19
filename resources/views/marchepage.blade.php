@extends('layouts.page')
@section('content')
<header style="background: url('/assets/img/mining-exploration-activities.jpg') top / auto; height: 80px;"></header>
<div class="container" style="width: 100%; margin-top: 30px;">
    <h5 style="background: #e8e8e8; padding: 20px; font-family: Roboto, sans-serif;">Dossier : Dossier_49365 - Acquisition de Matériel de travail en hauteur (Echafaudages) pour la SOTREG<br /></h5>
</div>
<div style="padding-right: 90px; padding-left: 90px;">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50%;">
                        <div><h4 style="color: rgb(0, 55, 109); font-family: Roboto, sans-serif;">Contenue du Marche</h4></div>
                    </th>
                </tr>
            </thead>
            <tbody style="border-color: rgb(0, 55, 109);">
                <tr>
                    <td style="border-width: 0px; width: 50%;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Code du Marche</strong><br /></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">#Marche_{{$marche->id}}<br /></p>
                        </div>
                    </td>
                    <td style="border-width: 0px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Titre du Marche</strong><br /></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">{{$marche->title}}<br /></p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50%;">
                        <div>
                            <h4 style="color: rgb(0, 55, 109); font-family: Roboto, sans-serif;">Données de l'opportunité<br /></h4>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody style="border-color: rgb(0, 55, 109);">
                <tr>
                    <td style="border-width: 0px; width: 50%;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Description</strong><br/></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">{{$marche->description}}<br /></p>
                        </div>
                    </td>
                    <td style="border-width: 0px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Catégorie de travaux</strong><br /></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">{{$categorie->name}}<br /></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="border-width: 0px; width: 50%;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Date limite d'affichage</strong><br /></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">{{$marche->limit_date}}<br /></p>
                        </div>
                    </td>
                    <td style="border-width: 0px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Type de procédure</strong><br /></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">Mache<br /></p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50%;">
                        <div>
                            <h4 style="color: rgb(0, 55, 109); font-family: Roboto, sans-serif;">Données de la structure achat<br /></h4>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody style="border-color: rgb(0, 55, 109);">
                <tr>
                    <td style="border-width: 0px; width: 50%;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Organisation Acheteur</strong><br /></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">Organisation A<br /></p>
                        </div>
                    </td>
                    <td style="border-width: 0px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Contact</strong><br /></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">Mache titre<br /></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="border-width: 0px; width: 50%;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Email</strong><br /></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">email@gmail.com<br /></p>
                        </div>
                    </td>
                    <td style="border-width: 0px; width: 50%;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Postuler</strong><br /></h5>
                            <p style="font-family: Roboto, sans-serif; color: rgb(89, 89, 89);">
                                <a href="#" style="background: var(--bs-table-bg); padding-top: 32px;"><i class="fa fa-share-square-o" style="font-size: 26px; color: rgb(90, 152, 89);"></i></a><br />
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50%;">
                        <div>
                            <h4 style="color: rgb(0, 55, 109); font-family: Roboto, sans-serif;">Pièces jointes de l'opportunité<br /></h4>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody style="border-color: rgb(0, 55, 109);">
                <tr>
                    <td style="width: 50%; border-width: 2px; border-left-width: 3px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Nom</strong><br /></h5>
                        </div>
                    </td>
                    <td style="width: 50%; border-width: 2px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Description</strong><br /></h5>
                        </div>
                    </td>
                    <td style="width: 50%; border-width: 2px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Commentaires&nbsp;&nbsp;</strong><br /></h5>
                        </div>
                    </td>
                    <td style="border-width: 2px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;"><strong>Date/Heure</strong><br /></h5>
                        </div>
                    </td>
                </tr>
                <tr style="border-width: 1px;">
                    <td style="width: 50%; border-width: 2px; border-left-width: 3px;">
                        <div>
                            <a href="/{{$marche->c_charge}}">
                                <h5 style="font-family: Roboto, sans-serif;">C Charge<i class="fa fa-download" style="margin-left: 10px; color: rgb(90, 152, 89);"></i></h5>
                            </a>
                        </div>
                    </td>
                    <td style="width: 50%; border-width: 2px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;">{{$marche->description}}<br /></h5>
                        </div>
                    </td>
                    <td style="width: 50%; border-width: 2px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif;">Commentaire<br /></h5>
                        </div>
                    </td>
                    <td style="width: 50%; border-width: 2px;">
                        <div>
                            <h5 style="font-family: Roboto, sans-serif; border-width: 2px;">2020<br /></h5>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection