@extends('layouts.page')
@section('content')
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div style="background: url('/assets/img/mining-exploration-activities.jpg') top; height: 100px;"></div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#"
                    style="background: #3c8447; color: #ffffff; box-shadow: 0px 0px; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">
                    Postulation
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"
                    style="background: #296232; color: #ffffff; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">Messagerie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"
                    style="background: #296232; color: #ffffff; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">Pieces
                    Joins</a>
            </li>
        </ul>
        <div class="container" style="padding-right: 0px; padding-left: 0px;">
            <div style=" background: #ffffff;  border-width: 0px;  box-shadow: 1px 1px 20px -10px;
                        padding-left: 30px;  padding-bottom: 2px;   padding-right: 0px;padding-top: 2px;
                        margin-left: 5%;  margin-right: 5%;  margin-top: 30px;width: 90%;    ">
                <p style="font-family: Roboto, sans-serif;">
                    Dossier :<a
                        href="https://esuppliers.ocpgroup.org/esop/toolkit/negotiation/tnd/detailTender.do?selectedCommandName=SETTINGS&amp;tenderCode=tender_45283&amp;from=menu">
                        <strong> Dossier_{{$marche->id}} </strong></a>-
                    {{$marche->title}}<br />
                </p>
                <p style="font-family: Roboto, sans-serif;">Dernière réponse envoyée le:{{$marche->created_at}}<br />
                </p>
            </div>
        </div>

        {{--form request--}}
        <form action="action('FormController@separer')" method="post" style="max-width:100% ;margin-top: 20px">
            @csrf
            <div class=" text-warning d-flex d-lg-flex flex-row justify-content-end align-self-end"
                style="margin-right: 83px; margin-top: 15px;">
                <button class="btn btn-primary" type="submitstyle=" margin-right: 9px; background:
                    var(--bs-success);">Modifier</button>
                <button class="btn btn-primary" type="submit" style="background: var(--bs-green);"
                    value="anuler">Annuler</button>
            </div>
            @foreach ($list as $sections)
            <h1 class="text-center"
                style="font-family: Roboto, sans-serif; background: var(--bs-green); color: rgb(255, 255, 255); width: 20%; margin-right: 40%; margin-left: 40%; border-radius: 45px; margin-top: 25px;">
                RFI
            </h1>
            @foreach ($sections as $section)
            <div style="margin-top: 26px;">

                <h2 style="font-family: Roboto, sans-serif; margin-left: 17px; font-size: 21.128px;">
                    <strong>1. Réponse de qualification (nombre de questions : 0 )</strong><br />
                </h2>
                <div class="accordion" role="tablist" id="accordion-1">
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button type="button" class="accordion-button collapsed collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordion-1 .item-1" aria-expanded="true"
                                aria-controls="accordion-1 .item-1">
                                <i class="fa fa-comments">
                                </i>&nbsp;1.1&nbsp;Dossier Fournisseur - Données Saisies
                                -Section avec questions VM<br />
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
                                            {{-- @foreach ($list_questions as $item)
                                            <tr>
                                            </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordion-1 .item-2" aria-expanded="true"
                                aria-controls="accordion-1 .item-2">
                                <i class="fa fa-comments"></i>&nbsp;1.2&nbsp;Dossier Fournisseur - Pièces jointes -
                                Section
                                avec questions VM<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse show item-2" role="tabpanel"
                            data-bs-parent="#accordion-1">
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
                                            {{-- @foreach ($list_questions as $item)

                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button type="button" class="accordion-button collapsed collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordion-1 .item-3" aria-expanded="true"
                                aria-controls="accordion-1 .item-3">
                                <i class="fa fa-comments"></i>&nbsp;1.3 Management HSE- section avec VM
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
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
                                            {{-- @foreach ($list_questions as $item)

                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
            <div style="margin-top: 26px;">
                <h2 style="font-family: Roboto, sans-serif; margin-left: 17px; font-size: 21.128px;"><strong>2. Réponse
                        technique (nombre de questions : 0 )</strong><br /></h2>
                <div class="accordion" role="tablist" id="accordion-2">
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button type="button" class="accordion-button collapsed collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordion-2 .item-1" aria-expanded="true"
                                aria-controls="accordion-2 .item-1">
                                <i class="fa fa-comments"></i>&nbsp;2.1&nbsp; SITUATION FINANCIAIRE&nbsp;<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-1" role="tabpanel" data-bs-parent="#accordion-2">
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
                                            {{-- @foreach ($list_questions as $item)

                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button type="button" class="accordion-button collapsed collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordion-2 .item-2" aria-expanded="true"
                                aria-controls="accordion-2 .item-2">
                                <i class="fa fa-comments"></i>&nbsp; 2.2 EXPERIENCE ET REFERENCES&nbsp;&nbsp;<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-2" role="tabpanel" data-bs-parent="#accordion-2">
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
                                            {{-- @foreach ($list_questions as $item)

                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button type="button" class="accordion-button collapsed collapsed" data-bs-toggle="collapse"
                            data-bs-target="#accordion-2 .item-2" aria-expanded="true"
                            aria-controls="accordion-2 .item-2">
                            <i class="fa fa-comments"></i>&nbsp; 2.3 &nbsp; Certification&nbsp;<br />
                        </button>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-2">
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
                                            {{-- @foreach ($list_questions as $item)

                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="text-center"
                style="font-family: Roboto, sans-serif; background: var(--bs-green); color: rgb(255, 255, 255); width: 20%; margin-right: 40%; margin-left: 40%; border-radius: 45px; margin-top: 25px;">
                RFQ</h1>
            <div style="margin-top: 26px;">
                <div class="accordion" role="tablist" id="accordion-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button type="button" class="accordion-button collapsed collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordion-3 .item-1" aria-expanded="true"
                                aria-controls="accordion-3 .item-1">
                                <i class="fa fa-comments"></i>&nbsp; Fichier technique&nbsp;&nbsp;<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-1" role="tabpanel" data-bs-parent="#accordion-3">
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
                                            {{-- @foreach ($list_questions as $item)

                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordion-3 .item-2" aria-expanded="true"
                                aria-controls="accordion-3 .item-2">
                                <i class="fa fa-comments"></i>&nbsp; &nbsp;Commerciale&nbsp; &nbsp;<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse show item-2" role="tabpanel"
                            data-bs-parent="#accordion-3">
                            <div class="accordion-body">
                                <div class="table-responsive"
                                    style="margin-left: 2px; margin-right: 25px; border: 1px none var(--bs-blue);">
                                    <table class="table">
                                        <thead style="height: 1px;text-align:center;">
                                            <tr style="background: var(--bs-green);">
                                                <th style="padding-top: 11px; padding-left: 19px;border-width: 1px;">
                                                    Identifiant</th>
                                                <th style="padding-top: 11px; padding-left: 19px;border-width: 1px;">
                                                    NOM
                                                </th>
                                                <th style="padding-top: 11px; padding-left: 19px; border-width: 1px;">
                                                    Unité/Mesure</th>
                                                <th style="padding-top: 11px; padding-left: 19px;border-width: 1px;">
                                                    QTé
                                                </th>
                                                <th style="padding-top: 11px; padding-left: 19px;border-width: 1px;">
                                                    Comentaire</th>
                                                <th style="padding-top: 11px; padding-left: 19px;border-width: 1px;">
                                                    Type</th>
                                                <th style="padding-top: 11px; padding-left: 19px;border-width: 1px;">
                                                    Devis</th>
                                                <th style="padding-top: 11px; padding-left: 19px; border-width: 1px;">
                                                    Prix</th>
                                                <th style="padding-top: 11px; padding-left: 19px; border-width: 1px;">
                                                    Prix Totale</th>
                                            </tr>
                                        </thead>
                                        <tbody style="padding-left: 10px; ">
                                            @foreach ($list_produit as $item)
                                            <tr>
                                                <td style="border-width: 1px;">
                                                    &nbsp; &nbsp; &nbsp;
                                                    &nbsp; {{$item->id}}</td>
                                                <td style=" border-width: 1px;">
                                                    &nbsp; &nbsp; &nbsp; &nbsp;{{$item->nom}}
                                                </td>
                                                <td style=" border-width: 1px;">
                                                    &nbsp; &nbsp; &nbsp; &nbsp;{{$item->unit}}</td>
                                                <td style=" border-width: 1px;">
                                                    &nbsp; &nbsp; &nbsp;
                                                    &nbsp;{{$item->qte}}
                                                </td>
                                                <td style="border-width: 1px;">{{$item->commentaire}}</td>
                                                <td style="" padding-top: 11px; padding-left: 19px; border-width: 1px;">
                                                    <select>
                                                        <optgroup label="Type">
                                                            <option value="0" selected=""></option>
                                                            <option value="2">Article</option>
                                                            <option value="14">Variable</option>
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td style="border-width: 1px;">
                                                    <select style="height: 22.8px; width: 105.4px;">
                                                        <optgroup label="Type">
                                                            <option value="0" selected=""></option>
                                                            <option value="2">Euro</option>
                                                            <option value="2">MAD</option>
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td style="border-width: 1px;">
                                                    <input type="number" id={{$item->id.'prix_input'}}
                                                    name="prix"
                                                    style="width: 77.4px; border-width: 1px;
                                                    border-style: solid;"
                                                    onkeyup="calcule_prix_totale({{$item->qte}},this,{{$item->id}})"
                                                    />
                                                </td>
                                                <td style="border-width: 1px;" id="prix_totale_{{$item->id}}">
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
        </form>
    </section>

</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="/js/main.js"></script>
{{-- <script src="assets/js/script.min.js"></script> --}}
@endsection