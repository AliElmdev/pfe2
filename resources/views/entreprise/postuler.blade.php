@extends('layouts.page')
@section('content')
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div style="background: url('/assets/img/mining-exploration-activities.jpg') top; height: 100px;"></div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="#"
                        style="background: #3c8447; color: #ffffff; box-shadow: 0px 0px; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;"
                    >
                        Postulation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="background: #296232; color: #ffffff; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">Messagerie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="background: #296232; color: #ffffff; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">Pieces Joins</a>
                </li>
            </ul>
            <div class="container" style="padding-right: 0px; padding-left: 0px;">
                <div
                    style="
                        background: #ffffff;
                        border-width: 0px;
                        box-shadow: 1px 1px 20px -10px;
                        padding: 0px;
                        padding-left: 30px;
                        padding-bottom: 2px;
                        padding-right: 0px;
                        padding-top: 2px;
                        margin-left: 5%;
                        margin-right: 5%;
                        margin-top: 30px;
                        width: 90%;
                    "
                >
                    <h2 class="text-info" style="font-family: Roboto, sans-serif;">Contact Us</h2>
                    @foreach ($questions as $question)
                        <div>{{$question->question}}</div>
                    @endforeach
                    <p style="font-family: Roboto, sans-serif;">
                        Dossier :<a href="https://esuppliers.ocpgroup.org/esop/toolkit/negotiation/tnd/detailTender.do?selectedCommandName=SETTINGS&amp;tenderCode=tender_45283&amp;from=menu"><strong>Dossier_48865</strong></a>-
                        Acquisition d'un logiciel d'Audit et de Reporting pour les plateformes Active<br />
                    </p>
                    <p style="font-family: Roboto, sans-serif;">Dernière réponse envoyée le: 20/02/2022<br /></p>
                </div>
            </div>
            <div class="text-warning d-flex d-lg-flex flex-row justify-content-end align-self-end" style="margin-right: 83px; margin-top: 15px;">
                <button class="btn btn-primary" type="button" style="margin-right: 9px; background: var(--bs-success);">Modifier</button><button class="btn btn-primary" type="submit" style="background: var(--bs-green);">Annuler</button>
            </div>
            <h1 class="text-center" style="font-family: Roboto, sans-serif; background: var(--bs-green); color: rgb(255, 255, 255); width: 20%; margin-right: 40%; margin-left: 40%; border-radius: 45px; margin-top: 25px;">RFI</h1>
            <div style="margin-top: 26px;">
                <h2 style="font-family: Roboto, sans-serif; margin-left: 17px; font-size: 21.128px;"><strong>1. Réponse de qualification (nombre de questions : 0 )</strong><br /></h2>
                <div class="accordion" role="tablist" id="accordion-1">
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button class="accordion-button collapsed collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-1" aria-expanded="true" aria-controls="accordion-1 .item-1">
                                <i class="fa fa-comments"></i>&nbsp;1.1&nbsp;Dossier Fournisseur - Données Saisies - Section avec questions VM<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-1" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Question&nbsp;</th>
                                                <th>Reponse</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Donner le chiffre d'affaire</td>
                                                <td><input type="file" class="form-costum" /></td>
                                            </tr>
                                            <tr>
                                                <td>Votre entreprise possède -elle des listes des postes dangereux&nbsp; &nbsp;</td>
                                                <td>
                                                    <select style="height: 25.8px; width: 134px;">
                                                        <optgroup label="Oui / NON"><option value="0" selected=""></option><option value="1">OUI</option><option value="2">NON</option></optgroup>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-2" aria-expanded="true" aria-controls="accordion-1 .item-2">
                                <i class="fa fa-comments"></i>&nbsp;1.2&nbsp;Dossier Fournisseur - Pièces jointes - Section avec questions VM<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse show item-2" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Reponse</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Qu'elle sont les domaine associoer a votre entreprise&nbsp;</td>
                                                <td>
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1" /><label class="form-check-label" for="formCheck-1">Label</label></div>
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3" /><label class="form-check-label" for="formCheck-3">Label</label></div>
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2" /><label class="form-check-label" for="formCheck-2">Label</label></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Donner le une etude totale sur le projet</td>
                                                <td><input type="file" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button class="accordion-button collapsed collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-3" aria-expanded="true" aria-controls="accordion-1 .item-3">
                                <i class="fa fa-comments"></i>&nbsp;1.3 Management HSE- section avec VM
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cell 1</td>
                                                <td>Cell 2</td>
                                            </tr>
                                            <tr>
                                                <td>Cell 3</td>
                                                <td>Cell 4</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top: 26px;">
                <h2 style="font-family: Roboto, sans-serif; margin-left: 17px; font-size: 21.128px;"><strong>2. Réponse technique (nombre de questions : 0 )</strong><br /></h2>
                <div class="accordion" role="tablist" id="accordion-2">
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button class="accordion-button collapsed collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-2 .item-1" aria-expanded="true" aria-controls="accordion-2 .item-1">
                                <i class="fa fa-comments"></i>&nbsp;1.1&nbsp; SITUATION FINANCIAIRE&nbsp;<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-1" role="tabpanel" data-bs-parent="#accordion-2">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cell 1</td>
                                                <td>Cell 2</td>
                                            </tr>
                                            <tr>
                                                <td>Cell 3</td>
                                                <td>Cell 4</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button class="accordion-button collapsed collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-2 .item-2" aria-expanded="true" aria-controls="accordion-2 .item-2">
                                <i class="fa fa-comments"></i>&nbsp; 2.2 EXPERIENCE ET REFERENCES&nbsp;&nbsp;<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-2" role="tabpanel" data-bs-parent="#accordion-2">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cell 1</td>
                                                <td>Cell 2</td>
                                            </tr>
                                            <tr>
                                                <td>Cell 3</td>
                                                <td>Cell 4</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button class="accordion-button collapsed collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-2 .item-3" aria-expanded="true" aria-controls="accordion-2 .item-3">
                                <i class="fa fa-comments"></i>&nbsp; 2.2 CERTIFICATION&nbsp;
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-2">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cell 1</td>
                                                <td>Cell 2</td>
                                            </tr>
                                            <tr>
                                                <td>Cell 3</td>
                                                <td>Cell 4</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="text-center" style="font-family: Roboto, sans-serif; background: var(--bs-green); color: rgb(255, 255, 255); width: 20%; margin-right: 40%; margin-left: 40%; border-radius: 45px; margin-top: 25px;">RFQ</h1>
            <div style="margin-top: 26px;">
                <div class="accordion" role="tablist" id="accordion-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button class="accordion-button collapsed collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-3 .item-1" aria-expanded="true" aria-controls="accordion-3 .item-1">
                                <i class="fa fa-comments"></i>&nbsp; Fichier technique&nbsp;&nbsp;<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-1" role="tabpanel" data-bs-parent="#accordion-3">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="border-width: 0px;">Fiche Produit 1</td>
                                                <td style="border-width: 0px;"><input type="file" /></td>
                                                <td style="border-width: 0px;"></td>
                                            </tr>
                                            <tr>
                                                <td style="border-width: 0px;">Fich Service 1</td>
                                                <td style="border-width: 0px;"><input type="file" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-3 .item-2" aria-expanded="true" aria-controls="accordion-3 .item-2">
                                <i class="fa fa-comments"></i>&nbsp; &nbsp;Commerciale&nbsp; &nbsp;<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse show item-2" role="tabpanel" data-bs-parent="#accordion-3">
                            <div class="accordion-body">
                                <div class="table-responsive" style="margin-left: 2px; margin-right: 25px; border: 2.4px none var(--bs-blue);">
                                    <table class="table">
                                        <thead style="height: 77px;">
                                            <tr style="background: var(--bs-green);">
                                                <th>Identifiant</th>
                                                <th>NOM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>
                                                <th style="width: 119.262px;">Unité/Mesure</th>
                                                <th>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;QTé&nbsp; &nbsp; &nbsp; &nbsp;</th>
                                                <th>Comentaire</th>
                                                <th>Type</th>
                                                <th>Devis</th>
                                                <th>Prix</th>
                                                <th>Prix Totale</th>
                                            </tr>
                                        </thead>
                                        <tbody style="padding-left: 10px;">
                                            <tr>
                                                <td style="padding-top: 11px; padding-left: 19px;">&nbsp; &nbsp; &nbsp; &nbsp; 1</td>
                                                <td>&nbsp; &nbsp; &nbsp; &nbsp; pc</td>
                                                <td>&nbsp; &nbsp; &nbsp; &nbsp;unité</td>
                                                <td style="border-width: 0px;">&nbsp; &nbsp; &nbsp; &nbsp;20</td>
                                                <td style="border-width: 0px;">walo</td>
                                                <td style="border-width: 0px;">
                                                    <select>
                                                        <optgroup label="Type"><option value="0" selected=""></option><option value="2">Article</option><option value="14">Variable</option></optgroup>
                                                    </select>
                                                </td>
                                                <td style="border-width: 0px;">
                                                    <select style="height: 22.8px; width: 105.4px;">
                                                        <optgroup label="Type"><option value="0" selected=""></option><option value="2">Euro</option><option value="2">MAD</option></optgroup>
                                                    </select>
                                                </td>
                                                <td style="border-width: 0px;"><input type="text" style="width: 77.4px; border-radius: 0px; border-width: 1px; border-style: solid;" /></td>
                                                <td style="border-width: 0px;">...................</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top: 11px; padding-left: 19px;">&nbsp; &nbsp; &nbsp; &nbsp; 2</td>
                                                <td>&nbsp; &nbsp; IMPRIMANTE</td>
                                                <td>&nbsp; &nbsp; &nbsp; &nbsp;unité</td>
                                                <td style="border-width: 0px;">&nbsp; &nbsp; &nbsp; &nbsp;10</td>
                                                <td style="border-width: 0px;">KAYN MAYTGAL</td>
                                                <td style="border-width: 0px;">
                                                    <select>
                                                        <optgroup label="Type"><option value="0" selected=""></option><option value="2">Article</option><option value="14">Variable</option></optgroup>
                                                    </select>
                                                </td>
                                                <td style="border-width: 0px;">
                                                    <select style="height: 22.8px; width: 105.4px;">
                                                        <optgroup label="Type"><option value="0" selected=""></option><option value="2">Euro</option><option value="2">MAD</option></optgroup>
                                                    </select>
                                                </td>
                                                <td style="border-width: 0px;"><input type="text" style="width: 77.4px; border-width: 1px; border-radius: 0px;" /></td>
                                                <td style="border-width: 0px;">no one</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        {{-- <script src="assets/js/script.min.js"></script> --}}
@endsection