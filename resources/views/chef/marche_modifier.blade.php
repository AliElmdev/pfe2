@extends('layouts.dashboard')

@section('navbar')
@if(Auth::user()->hasRole('chef'))
<li class="nav-item">
    <a class="nav-link" href="/statistics">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="{{route('profile',['id' => Auth::user()->id])}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Mon compte</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('chats_chef')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Message</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
        aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Mes Projets</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mes projets:</h6>
            <a class="collapse-item" href="{{route('create_project')}}">Créer un nouveau projet</a>
            <a class="collapse-item" href="{{route('marches_en_cours_chef',['id_chef' => Auth::user()->id])}}">Marchés
                en cours</a>
            <a class="collapse-item" href="{{route('marches_fermes_chef',['id_chef' => Auth::user()->id])}}">Marchés
                fermés</a>
            <a class="collapse-item" href="{{route('marches_termines_chef',['id_chef' => Auth::user()->id])}}">Marchés
                terminés</a>
            <a class="collapse-item" href="{{route('tous-marches_chef',['id_chef' => Auth::user()->id])}}">Tous les
                marchés</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Page d'acceuil</span></a>
</li>

@endif


@if(Auth::user()->hasRole('achat'))
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="{{route('profile')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Mon compte</span></a>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
        aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Mes Projets</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mes projets:</h6>
            <a class="collapse-item" href={{route('marcheEnCoursCreation')}}>En cours de creation</a>
            <a class="collapse-item" href={{route('marchesAchat')}}>En cours</a>
            <a class="collapse-item" href={{route('marchesAchatEnCours')}}>Terminer</a>
            <a class="collapse-item" href={{route('marchesAchatTerminer')}}>Tous les projets</a>
        </div>
    </div>
</li>

@endif

@endsection

@section('content')

<body id="page-top" style="font-family: Roboto, sans-serif;border-color: rgb(159,159,159);">
    <div id="wrapper" style="padding-bottom: 10%">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-uppercase text-primary m-0 fw-bold" style="text-align: center;">Marches
                                {{$list_marches_information->title}}
                            </p>
                        </div>

                        <form style="max-width:100%" enctype="multipart/form-data" method="POST"
                            action="{{route('modification_marches',$list_marches_information-> id)}}" id="reponse"
                            disabled="on">
                            @csrf
                            <div class="card-body " style="margin-top: 1% ;"">
                                <div class=" row" style="padding-left: 95%;margin-left: 2%; padding-bottom: 1%">
                                <div class="col-md-6">
                                    <div class="text-warning d-flex d-lg-flex flex-row justify-content-end align-self-end"
                                        style="margin-right: 83px; margin-top: 15px;">
                                        <button class="btn btn-primary modifer" type="button"
                                            style="margin-right: 9px; display:block;"
                                            onclick="btn_modifer();">Modifier</button><button
                                            class="btn btn-primary enregister" type="submit"
                                            style="margin-right: 9px;display:none"
                                            onclick="btn_modifer();">Enregister</button>
                                        <button class="btn btn-primary" type="reset"
                                            onclick="btn_annuler()">Annuler</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="card-header py-3">
                                <p class="text-uppercase text-primary m-0 fw-bold"
                                    style="text-align: center;color: blue">
                                    Des Informations sur le marche
                                </p>
                            </div>

                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info"
                                style="border-radius: 10px;border-width: 1px;border-style: solid;">
                                <table class="table my-0" id="dataTable">
                                    <thead style="text-align: center;background: #93d1e4;">

                                        <tr>
                                            <th>Nom de marche</th>
                                            <th>Description </th>
                                            <th> Date limite</th>
                                            <th> Date affichage</th>
                                            <th>Categories</th>
                                            <th>Cahier de charge</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align: center">
                                            <td> <input type="text" id="reponse_title" name="title"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="form-control reponse"
                                                    disabled value="{{$list_marches_information->title}}">
                                            </td>
                                            <td> <input type="text" id="reponse_description" name="descriptionm"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="form-control reponse"
                                                    disabled value="{{$list_marches_information->description}}">
                                            </td>
                                            <td> <input type="date" id="reponse_limit_date" name="limit_date"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="form-control reponse"
                                                    disabled value="{{$list_marches_information->limit_date}}">
                                            </td>
                                            <td>
                                                <input type="date" id="reponse_date_affichage" name="date_affichage"
                                                    style="border: none;max-width: 100%; text-align: center;"
                                                    autofocus="autofocus" required="" class="form-control reponse"
                                                    disabled value="{{$list_marches_information->affichage_date}}">
                                            </td>

                                            <td>

                                                <div id="dataTable_length" class="dataTables_length"
                                                    aria-controls="dataTable" class="chosen form-select">
                                                    <select class="d-inline-block form-select form-select-sm reponse"
                                                        name="categorie" id="reponse_categorie" autofocus="autofocus"
                                                        required="" class="reponse" disabled>
                                                        @foreach ($list_categories as $item)
                                                        @if ($item->id ==$list_marches_information->id_cat)
                                                        <option value="{{$item->id}}" selected>
                                                            {{$item->name}}
                                                        </option>
                                                        @else
                                                        <option value="{{$item->id}}">{{$item->name}}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </td>

                                            <td>
                                                <div id="c_charge">
                                                    <button class="btn" type="button">
                                                        <a href={{URL::to('/') .'/'.
                                                            $list_marches_information->c_charge}}
                                                            download={{$list_marches_information->c_charge}}><i
                                                                class="fa fa-download"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>

                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info"
                                style="border-radius: 10px;border-width: 1px;border-style: solid;">
                                <table class="table my-0" id="item_table">
                                    <thead style="text-align: center;background: #93d1e4;">
                                        <tr>
                                            <th>Nom de produit</th>
                                            <th> Commentaire</th>
                                            <th> Quantité</th>
                                            <th> Services/Produit</th>
                                            <th> Unité</th>
                                            <th href="#">
                                                <button class="btn btn-primary add reponse" name="add" type="button"
                                                    style="font-size: 16px; font-weight: bold; background: rgb(53, 132, 144);" " disabled>
                                                    <strong>+</strong>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_produits as $item)
                                        <tr style=" text-align: center;">
                                            <td>
                                                <input type="text" id="produit" name="nom[]"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="form-control reponse"
                                                    disabled value="{{$item->nom}}" disabled>
                                            </td>
                                            <td>
                                                <input type="text" id="produit_descption" name="description[]"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="form-control reponse"
                                                    disabled value="{{$item->commentaire}}">
                                            </td>
                                            <td>
                                                <input name="qte[]" type="number" class="form-control reponse"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" disabled value="{{$item->qte}}">
                                            </td>
                                            <td>
                                                <div id="dataTable_length" class="dataTables_length"
                                                    aria-controls="dataTable" class="chosen form-select">
                                                    <select class="d-inline-block form-select form-select-sm reponse"
                                                        name=" serv_prod[]" id="serv_prod[]" disabled>
                                                        @if ($item->serv_prod =='service')
                                                        <option value="service" selected>
                                                            service
                                                        </option>
                                                        <option value="produit">
                                                            produit
                                                        </option>
                                                        @elseif ($item->serv_prod =='produit')
                                                        <option value="service">
                                                            service
                                                        </option>
                                                        <option value="produit" selected>
                                                            produit
                                                        </option>
                                                        @else
                                                        <option value="service">
                                                            service
                                                        </option>
                                                        <option value="produit" selected>
                                                            produit
                                                        </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="dataTable_length" class="dataTables_length"
                                                    aria-controls="dataTable" class="chosen form-select">
                                                    <select name="unit[]" id="unite"
                                                        class="d-inline-block form-select form-select-sm reponse"
                                                        disabled>
                                                        @if ($item->unit =='m')
                                                        <option value="m" selected>
                                                            Metre
                                                        </option>
                                                        <option value="kg">
                                                            KiloGramme
                                                        </option>
                                                        <option value="u">
                                                            Unit
                                                        </option>
                                                        @elseif ($item->unit =='kg')
                                                        <option value="m">
                                                            Metre
                                                        </option>
                                                        <option value="kg" selected>
                                                            KiloGramme
                                                        </option>
                                                        <option value="u">
                                                            Unit
                                                        </option>
                                                        @elseif ($item->unit =='u')
                                                        <option value="m">
                                                            Metre
                                                        </option>
                                                        <option value="kg">
                                                            KiloGramme
                                                        </option>
                                                        <option value="u" selected>
                                                            Unit
                                                        </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary remove reponse" name="remove"
                                                    type="button" style="background: rgb(230, 0, 0);" disabled>
                                                    <strong>x</strong>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <br>
                            <div id="Questions_RFQ">
                                <div class="card-header py-3" style="padding-top: 50%;">
                                    <p class="text-uppercase text-primary m-0 fw-bold"
                                        style="text-align: center;color: blue">
                                        Des Question RFQ DU MARCHES
                                    </p>
                                </div>

                                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info"
                                    style="border-radius: 10px;border-width: 1px;border-style: solid;">

                                    <table class="table my-0">
                                        <thead style="text-align: center;background: #93d1e4;">
                                            <tr>
                                                <th>Question</th>
                                                <th>Description</th>
                                                <th> Type de question</th>
                                                <th>Option</th>
                                                <th> Section</th>
                                                <th>
                                                    <button class="btn btn-primary btn_qts_rfi_rfq reponse"
                                                        type="button" onclick="add_RFQ_qst()" disabled>
                                                        <strong>+</strong>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_rfq" style='text-align:center'>
                                            @foreach ($questions_RFQ_marche as $question)
                                            <tr align="center">
                                                <td>
                                                    <input hidden name="question_input_rfq[]"
                                                        value={{$question->question}}>{{$question->question}}
                                                </td>
                                                <td>
                                                    <input hidden name="description_input_rfq[]"
                                                        value={{$question->description}} />{{$question->description}}
                                                </td>
                                                <td>
                                                    <input hidden name="type_input_rfq[]"
                                                        value="{{$question->type}}" />{{$question->type}}
                                                </td>
                                                <td><input hidden name="option_input_rfq[]"
                                                        value="{{$question->options}}" />
                                                </td>
                                                <td>
                                                    <input hidden name="section_input_rfq[]"
                                                        value="{{$question->section_id}}" />
                                                    {{$question->section_id}}
                                                </td>

                                                <td style="padding-left: 3%">
                                                    <button class="btn btn-danger rfqqst_item reponse"
                                                        style="margin-left: 5px;" type="button" disabled>
                                                        <i class="fa fa-trash" style="font-size: 15px;"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div>
                                <div id="rfqnv_qst_rfq" style="display:none;">
                                    <h4
                                        style="text-align: center;background: rgba(37,71,106,0.56);color: rgb(255,255,255);">
                                        Ajouter
                                        Questions</h4>
                                    <div class="d-flex justify-content-between">
                                        <select class="chosen chosen_rfq" required=""
                                            style="color: #232323;width: 69%;margin: 0;" onchange="myFunctionRFQ();">
                                            <option value="0"></option>
                                            @foreach ($questions_RFQ as $question)
                                            <option value="{{$question->id}}">{{$question->question}}</option>
                                            @endforeach
                                            <option selected="selected" value="0">Nouvelle Question</option>
                                        </select><select onclick="changetype_RFQ()" class="types_qst_RFQ"
                                            style="width: 29%;margin: 0;">
                                            <optgroup label="Types de questions">
                                                <option value="cm" selected="">Choix multiple</option>
                                                <option value="f">Fichier</option>
                                                <option value="cr">Court réponse</option>
                                                <option value="on">Oui / Non</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center rfqnv_cr"
                                    style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                                    <div><span>Question :&nbsp;</span><input class="rfqqstcr_input" type="text"
                                            style="width: 80%;margin-top: 10px;"></div>
                                    <div><span>Description :&nbsp;</span><input class="rfqdesccr_input" type="text"
                                            style="width: 80%;margin-top: 10px;"></div>
                                    <div>
                                        <span>Section :&nbsp;</span>
                                        <select class="section_rfqqst_cr_input"
                                            style="width: 35%;margin: 0; margin-top:2%;">
                                            <optgroup label="Section de question">
                                                @foreach ($sections_RFQ as $section)
                                                <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <button onclick="Annuler_RFQ()" class="btn btn-primary" type="button"
                                        style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                                    <button onclick="Ajouter_RFQ()" class="btn btn-primary" type="button"
                                        style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                                </div>
                                <div class="text-center rfqnv_f"
                                    style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                                    <div><span>Question :&nbsp;</span><input class="rfqqstf_input" type="text"
                                            style="width: 80%;margin-top: 10px;"></div>
                                    <div><span>Description :&nbsp;</span><input class="rfqdescf_input" type="text"
                                            style="width: 80%;margin-top: 10px;"></div>
                                    <div>
                                        <span>Section :&nbsp;</span>
                                        <select class="section_rfqqst_f_input"
                                            style="width: 35%;margin: 0; margin-top:2%;">
                                            <optgroup label="Section de question">
                                                @foreach ($sections_RFQ as $section)
                                                <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <button onclick="Annuler_RFQ()" class="btn btn-primary" type="button"
                                        style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                                    <button onclick="Ajouter_RFQ()" class="btn btn-primary" type="button"
                                        style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                                </div>
                                <div class="text-center rfqnv_on"
                                    style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                                    <div><span>Question :&nbsp;</span><input class="rfqqston_input" type="text"
                                            style="width: 80%;margin-top: 10px;"></div>
                                    <div><span>Description :&nbsp;</span><input class="rfqdescon_input" type="text"
                                            style="width: 79%;margin-top: 10px;"></div>
                                    <div>
                                        <span>Section :&nbsp;</span>
                                        <select class="section_rfqqst_on_input"
                                            style="width: 35%;margin: 0; margin-top:2%;">
                                            <optgroup label="Section de question">
                                                @foreach ($sections_RFQ as $section)
                                                <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div style="margin-top: 30px;">
                                        <h5 class="text-start" style="padding-left: 36%;">Options :</h5>
                                        <div id="sect_sqt_rfq">

                                        </div>
                                        <button class="btn btn-primary add" type="button"
                                            style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i
                                                class="fa fa-plus"
                                                style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button
                                            class="btn btn-primary remove" type="button"
                                            style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i
                                                class="fa fa-remove"
                                                style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button>
                                    </div>
                                    <button onclick="Annuler_RFQ()" class="btn btn-primary add_nvl_qst_rfq"
                                        type="button"
                                        style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                                    <button onclick="Ajouter_RFQ()" class="btn btn-primary" type="button"
                                        style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                                </div>
                                <div class="text-center rfqnv_cm"
                                    style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                                    <div><span>Question :&nbsp;</span><input class="rfqqstcm_input" type="text"
                                            style="width: 80%;margin-top: 10px;"></div>
                                    <div><span>Description :&nbsp;</span><input class="rfqdesccm_input" type="text"
                                            style="width: 79%;margin-top: 10px;"></div>
                                    <div>
                                        <span>Section :&nbsp;</span>
                                        <select class="section_rfqqst_cm_input"
                                            style="width: 35%;margin: 0; margin-top:2%;">
                                            <optgroup label="Section de question">
                                                @foreach ($sections_RFQ as $section)
                                                <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div style="margin-top: 30px;">
                                        <h5 class="text-start" style="padding-left: 36%;">Options :</h5>
                                        <div id="sect_sqt_rfq_b">

                                        </div>
                                        <span style="margin-top: 0px;padding-top: 0px;width: 51px;"><button
                                                class="btn btn-primary add_b" type="button"
                                                style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i
                                                    class="fa fa-plus"
                                                    style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button
                                                class="btn btn-primary remove_b" type="button"
                                                style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i
                                                    class="fa fa-remove"
                                                    style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button></span>
                                    </div>
                                    <button onclick="Annuler_RFQ()" class="btn btn-primary" type="button"
                                        style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                                    <button onclick="Ajouter_RFQ()" class="btn btn-primary" type="button"
                                        style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                                </div>
                            </div>



                            {{-- RFI Question --}}
                            <div id="Questions_RFI">
                                <div class="card-header py-3" style="padding-top: 50%;">
                                    <p class="text-uppercase text-primary m-0 fw-bold"
                                        style="text-align: center;color: blue">
                                        Des Question RFI DU MARCHES
                                    </p>
                                </div>

                                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info"
                                    style="border-radius: 10px;border-width: 1px;border-style: solid;">

                                    <table class="table my-0">
                                        <thead style="text-align: center;background: #93d1e4;">
                                            <tr>
                                                <th>Question</th>
                                                <th>Description</th>
                                                <th> Type de question</th>
                                                <th>Option</th>
                                                <th> Section</th>
                                                <th>
                                                    <button class="btn btn-primary btn_qts_rfi_rfq reponse"
                                                        type="button" onclick="add_RFI_qst()" disabled>
                                                        <strong>+</strong>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_rfi" style='text-align:center'>
                                            @foreach ($questions_RFI_marche as $question)
                                            <tr style="text-align: center">
                                                <td>
                                                    <input hidden name="question_input_rfi[]"
                                                        value="{{$question->question}}">{{$question->question}}
                                                </td>
                                                <td>
                                                    <input hidden name="description_input_rfi[]"
                                                        value={{$question->description}} />{{$question->description}}
                                                </td>
                                                <td>
                                                    <input hidden name="type_input_rfi[]"
                                                        value="{{$question->type}}" />{{$question->type}}
                                                </td>
                                                <td><input hidden name="option_input_rfi[]"
                                                        value="{{$question->options}}" />{{$question->options}}
                                                </td>
                                                <td>
                                                    <input hidden name="section_input_rfi[]"
                                                        value="{{$question->section_id}}" />{{$question->section_id}}
                                                </td>

                                                <td style=" padding-left: 3%">
                                                    <button class="btn btn-danger rfqqst_item reponse"
                                                        style="margin-left: 5px;" type="button" disabled>
                                                        <i class="fa fa-trash" style="font-size: 15px;"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <section style="text-align:right">
                                            <div id="rfinv_qst_rfi" style="display:none;">
                                                <h4
                                                    style="text-align: center;background: rgba(37,71,106,0.56);color: rgb(255,255,255);">
                                                    Ajouter Questions</h4>
                                                <div class="d-flex justify-content-between"><select class="chosen"
                                                        required="" style="color: #232323;width: 69%;margin: 0;"
                                                        onchange="myFunctionRFI()">
                                                        <option value="0"></option>
                                                        @foreach ($questions_RFI as $question)
                                                        <option value="{{$question->id}}">{{$question->question}}
                                                        </option>
                                                        @endforeach
                                                        <option selected="selected" value="0">Nouvelle Question</option>
                                                    </select><select onclick="changetype_RFI()" class="types_qst_RFI"
                                                        style="width: 29%;margin: 0;">
                                                        <optgroup label="Types de questions">
                                                            <option value="cm" selected="">Choix multiple</option>
                                                            <option value="f">Fichier</option>
                                                            <option value="cr">Court réponse</option>
                                                            <option value="on">Oui / Non</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="text-center rfinv_cr"
                                                style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                                                <div><span>Question :&nbsp;</span><input class="rfiqstcr_input"
                                                        type="text" style="width: 80%;margin-top: 10px;"></div>
                                                <div><span>Description :&nbsp;</span><input class="rfidesccr_input"
                                                        type="text" style="width: 80%;margin-top: 10px;"></div>
                                                <div>
                                                    <span>Section :&nbsp;</span>
                                                    <select class="section_rfiqst_cr_input"
                                                        style="width: 35%;margin: 0; margin-top:2%;">
                                                        <optgroup label="Section de question">
                                                            @foreach ($sections_RFI as $section)
                                                            <option value="{{$section->id}}">{{$section->nom_section}}
                                                            </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <button onclick="Annuler_RFI()" class="btn btn-primary" type="button"
                                                    style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                                                <button onclick="Ajouter_RFI()" class="btn btn-primary" type="button"
                                                    style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                                            </div>
                                            <div class="text-center rfinv_f"
                                                style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                                                <div><span>Question :&nbsp;</span><input class="rfiqstf_input"
                                                        type="text" style="width: 80%;margin-top: 10px;"></div>
                                                <div><span>Description :&nbsp;</span><input class="rfidescf_input"
                                                        type="text" style="width: 80%;margin-top: 10px;"></div>
                                                <div>
                                                    <span>Section :&nbsp;</span>
                                                    <select class="section_rfiqst_f_input"
                                                        style="width: 35%;margin: 0; margin-top:2%;">
                                                        <optgroup label="Section de question">
                                                            @foreach ($sections_RFI as $section)
                                                            <option value="{{$section->id}}">{{$section->nom_section}}
                                                            </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <button onclick="Annuler_RFI()" class="btn btn-primary" type="button"
                                                    style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button><button
                                                    onclick="Ajouter_RFI()" class="btn btn-primary" type="button"
                                                    style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                                            </div>
                                            <div class="text-center rfinv_on"
                                                style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                                                <div><span>Question :&nbsp;</span><input class="rfiqston_input"
                                                        type="text" style="width: 80%;margin-top: 10px;"></div>
                                                <div><span>Description :&nbsp;</span><input class="rfidescon_input"
                                                        type="text" style="width: 79%;margin-top: 10px;"></div>
                                                <div>
                                                    <span>Section :&nbsp;</span>
                                                    <select class="section_rfiqst_on_input"
                                                        style="width: 35%;margin: 0; margin-top:2%;">
                                                        <optgroup label="Section de question">
                                                            @foreach ($sections_RFI as $section)
                                                            <option value="{{$section->id}}">{{$section->nom_section}}
                                                            </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div style="margin-top: 30px;">
                                                    <h5 class="text-start" style="padding-left: 36%;">Options :</h5>
                                                    <div id="sect_sqt_rfi">

                                                    </div>
                                                    <button class="btn btn-primary add" type="button"
                                                        style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i
                                                            class="fa fa-plus"
                                                            style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button
                                                        class="btn btn-primary remove" type="button"
                                                        style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i
                                                            class="fa fa-remove"
                                                            style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button>
                                                </div>
                                                <button onclick="Annuler_RFI()" class="btn btn-primary add_nvl_qst_rfi"
                                                    type="button"
                                                    style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                                                <button onclick="Ajouter_RFI()" class="btn btn-primary" type="button"
                                                    style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                                            </div>
                                            <div class="text-center rfinv_cm"
                                                style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                                                <div><span>Question :&nbsp;</span><input class="rfiqstcm_input"
                                                        type="text" style="width: 80%;margin-top: 10px;"></div>
                                                <div><span>Description :&nbsp;</span><input class="rfidesccm_input"
                                                        type="text" style="width: 79%;margin-top: 10px;"></div>
                                                <div>
                                                    <span>Section :&nbsp;</span>
                                                    <select class="section_rfiqst_cm_input"
                                                        style="width: 35%;margin: 0; margin-top:2%;">
                                                        <optgroup label="Section de question">
                                                            @foreach ($sections_RFI as $section)
                                                            <option value="{{$section->id}}">{{$section->nom_section}}
                                                            </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div style="margin-top: 30px;">
                                                    <h5 class="text-start" style="padding-left: 36%;">Options :</h5>
                                                    <div id="sect_sqt_rfi_b">

                                                    </div>
                                                    <span style="margin-top: 0px;padding-top: 0px;width: 51px;"><button
                                                            class="btn btn-primary add_b" type="button"
                                                            style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i
                                                                class="fa fa-plus"
                                                                style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button
                                                            class="btn btn-primary remove_b" type="button"
                                                            style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i
                                                                class="fa fa-remove"
                                                                style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button></span>
                                                </div>
                                                <button onclick="Annuler_RFI()" class="btn btn-primary" type="button"
                                                    style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                                                <button onclick="Ajouter_RFI()" class="btn btn-primary" type="button"
                                                    style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                                            </div>

                                        </section>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        //dont send data whene refresh page
     if (window.history.replaceState) 
            { 
                window.history.replaceState( null,null, window.location.href );
             } 

  
        function btn_modifer()
        {
            
            if($(".enregister").is(":hidden"))
            { 
                
                $(".enregister").show();
                $(".modifer").hide();
                $(".reponse").prop("disabled",false);
                document.getElementById("c_charge").innerHTML ="<label for='c_charge_input' style='margin: -40% ' > <i style='padding-left: 6%'>"+
                    "<img src='https://img.icons8.com/ios-glyphs/30/000000/pdf-2.png' /></i></label>"+
                    "<input type='file' class='reponse' name='c_charge_input' id='c_charge_input' hidden>";

            
            }
            else
            {
            $(".enregister").hide();
             $(".modifer").show(); 
            }
        }    



        function btn_annuler()
        {
            
            if($(".enregister").is(":hidden"))
            { 
                
                $(".enregister").show();
                $(".modifer").hide();
                $(".reponse").prop("disabled",false);
            
            }
            else
            {
            $(".enregister").hide();
             $(".modifer").show(); 
             $(".reponse").prop("disabled",true);
             window.location.reload(true);
            }
        }    
        
        $(document).ready(function(){
            $(document).on('click', '.add', function(){
            var html = '';
            html += '<tr> <td><input class="form-control" name="nom[]" type="text" /></td>'
            html += '<td><textarea class="form-control" name="description[]" style="height: 34px;"></textarea></td>'
            html += '<td><input class="form-control" name="qte[]" type="number" /></td>'
            html += '<td> <select class="custom-select" name="serv_prod[]"><option value="service" selected="">Service</option><option value="Produit">Produit</option></optgroup></select></td>'
            html += '<td><select class="custom-select" name="unit[]"><option value="u" selected="">Unit</option><option value="m">Metre</option><option value="kg">KiloGramme</option></optgroup></select></td>'
            html += '<td><button class="btn btn-primary remove" name="remove" type="button" style="background: rgb(230, 0, 0);"><strong>x</strong></button></td></tr>'
            $('#item_table').append(html);
            });
            
            $(document).on('click', '.remove', function(){
            $(this).closest('tr').remove();
            });
            
            });
    
     
    </script>

    <script>
        $(".chosen").val(0).select2({
        matcher: function(params, data) {
            if (data.id === "0") { // <-- option value of "Other", always appears in results
                return data;
            } else {
                return $.fn.select2.defaults.defaults.matcher.apply(this, arguments);
            }
        },
    });
    //$('.chosen').val(nl);
    
    
    function add_RFI_qst() {
        var x = document.getElementById("rfinv_qst_rfi");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
            $("*[class*='rfinv_']").hide();
        }
    }
    
    
    function add_RFQ_qst() {
        var x = document.getElementById("rfqnv_qst_rfq");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
            $("*[class*='rfqnv_']").hide();
        }
    }
    
    //choose case a cocher
    function myFunctionRFI() {
        var id_question = $(".chosen").val();
        var questions = @json($questions);
        // var questions = {!! json_encode($questions->toArray()) !!};
        $.each(questions, function(i, item) {
            if (questions[i].id == id_question) {
                //show box to add new question with a specific type
                $(".types_qst_RFI").val(questions[i].type).change();
                var zone_add = ".rfinv_" + questions[i].type;
                $("*[class*='rfinv_']").hide();
                $(zone_add).show();
                //Fill inputs with questions template from data base
                var question_input = ".rfiqst" + questions[i].type + "_input";
                var description_input = ".rfidesc" + questions[i].type + "_input";
                var options_input = questions[i].options.split(";");
                var section_input = ".section_rfiqst_" +  questions[i].type + "_input";
                $(".option_rfi").remove();
                $(".option_b_rfi").remove();
                if (questions[i].type == 'cm') {
                    for (let index = 0; index < options_input.length; index++) {
                        add_option_b_rfi(options_input[index]);
                    }
                } else {
                    for (let index = 0; index < options_input.length; index++) {
                        add_option_rfi(options_input[index]);
                    }
                }
    
                $(question_input).val(questions[i].question);
                $(description_input).val(questions[i].description);
            };
        });
    }
    
    function myFunctionRFQ() {
        var id_question = $(".chosen_rfq").val();
        var questions = @json($questions);
        // var questions = {!! json_encode($questions->toArray()) !!};
        $.each(questions, function(i, item) {
            if (questions[i].id == id_question) {
                //show box to add new question with a specific type
                $(".types_qst_RFQ").val(questions[i].type).change();
                var zone_add = ".rfqnv_" + questions[i].type;
                $("*[class*='rfqnv_']").hide();
                $(zone_add).show();
                //Fill inputs with questions template from data base
                var question_input = ".rfqqst" + questions[i].type + "_input";
                var description_input = ".rfqdesc" + questions[i].type + "_input";
                var options_input = questions[i].options.split(";");
                var section_input = ".section_rfqqst_" +  questions[i].type + "_input";
                $(".option_rfq").remove();
                $(".option_b_rfq").remove();
                if (questions[i].type == 'cm') {
                    for (let index = 0; index < options_input.length; index++) {
                        add_option_b_rfq(options_input[index]);
                    }
                } else {
                    for (let index = 0; index < options_input.length; index++) {
                        add_option_rfq(options_input[index]);
                    }
                }
                $(question_input).val(questions[i].question);
                $(description_input).val(questions[i].description);
            };
        });
    }
    
    function changetype_RFI() {
        var type = $(".types_qst_RFI").val();
        var zone_add = ".rfinv_" + type;
        if ($(zone_add).is(":hidden")) {
            $("*[class*='rfinv_']").hide();
            $(zone_add).show();
        };
    }
    
    function changetype_RFQ() {
        var type = $(".types_qst_RFQ").val();
        var zone_add = ".rfqnv_" + type;
        if ($(zone_add).is(":hidden")) {
            $("*[class*='rfqnv_']").hide();
            $(zone_add).show();
        };
    }
    
    function Annuler_RFI() {
        add_RFI_qst();
    }
    
    function Annuler_RFQ() {
        add_RFQ_qst();
    }
    
    function Ajouter_RFI() {
    
        var type_qst = $(".types_qst_RFI").val();
        var question_input = $(".rfiqst" + type_qst + "_input").val();
        var description_input = $(".rfidesc" + type_qst + "_input").val();
        var options = '';
        var section_input = $(".section_rfiqst_"+ type_qst + "_input").val();
      
        if (type_qst != 'cr' && type_qst != 'f') {
            options = $.map($('.option_input_rfi'), function(e) { return e.value; }).join(';');
       
        }
        markup = '<tr><td>' + question_input + '<input hidden name="question_input_rfi[]" value="' + question_input + '" /></td><td>' + 
            description_input + '<input hidden name="description_input_rfi[]" value="' + description_input + '" /></td><td>' +
                 type_qst + '<input hidden name="type_input_rfi[]" value="' + type_qst + '" /></td><td>' + 
                    options + '<input hidden name="option_input_rfi[]" value="' + options + '" /></td><td>' +
                         section_input + '<input hidden name="section_input_rfi[]" value="' + section_input + 
            '"/></td><td style="text-align: center;padding-left: 3%"><button class="btn btn-danger rfiqst_item" style="margin-left: 5px;" type="button"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td></tr>'
        tableBody = $("#tbody_rfi");
        tableBody.append(markup);
    
        add_RFI_qst();
    }
    
    function Ajouter_RFQ() {
    
    var type_qst = $(".types_qst_RFQ").val();
    var question_input = $(".rfqqst" + type_qst + "_input").val();
    var description_input = $(".rfqdesc" + type_qst + "_input").val();
    var options = '';
    var section_input = $(".section_rfqqst_"+ type_qst + "_input").val();
    // $('.option').each(function() {
    //     var options += $(this).val();
    //     var options += ';';
    // });
    if (type_qst != 'cr' && type_qst != 'f') {
        options = $.map($('.option_input_rfq'), function(e) { return e.value; }).join(';');
        // values.join(';');
    }
    
    markup = '<tr><td>' + question_input + '<input hidden name="question_input_rfq[]" value="' + question_input + '" /></td><td>' + description_input + '<input hidden name="description_input_rfq[]" value="' + description_input + '" /></td><td>' + type_qst + '<input hidden name="type_input_rfq[]" value="' + type_qst + '" /></td><td>' + options + '<input hidden name="option_input_rfq[]" value="' + options + '" /></td><td>' + section_input + '<input hidden name="section_input_rfq[]" value="' + section_input + '"/></td><td style="text-align: center;"><button class="btn btn-danger rfqqst_item" style="margin-left: 5px;" type="button"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td></tr>'
    tableBody = $("#Questions_RFQ table tbody");
    tableBody.append(markup);
    
    add_RFQ_qst();
    }
    
    function add_option_rfi($option) {
        var html = '<div class="option_rfi" style="font-size: 19px;height: auto;"><div class="form-check text-start" style="margin-left: 29%;width: 26%;min-width: 150px;margin-bottom: 0px;"><input class="form-check-input" type="radio" id="formCheck-1" disabled=""><label class="form-check-label" for="formCheck-1" style="width: 100%;"><input class="option_input_rfi" type="text" style="width: 100%;" value="' + $option + '" placeholder="' + $option + '"></label></div></div>';
        html += '';
        $('#sect_sqt_rfi').append(html);
    }
    
    function add_option_rfq($option) {
        var html = '<div class="option_rfq" style="font-size: 19px;height: auto;"><div class="form-check text-start" style="margin-left: 29%;width: 26%;min-width: 150px;margin-bottom: 0px;"><input class="form-check-input" type="radio" id="formCheck-1" disabled=""><label class="form-check-label" for="formCheck-1" style="width: 100%;"><input class="option_input_rfq" type="text" style="width: 100%;" value="' + $option + '" placeholder="' + $option + '"></label></div></div>';
        html += '';
        $('#sect_sqt_rfq').append(html);
    }
    
    function add_option_b_rfi($option) {
        var html = '<div class="form-check d-inline-flex option_b_rfi"><input class="form-check-input" type="checkbox" id="formCheck-3" disabled=""><label class="form-check-label" for="formCheck-3"><input value="' + $option + '" placeholder="' + $option + '" class="option_input_rfi" type="text" style="margin-left: 10px;"></label></div>';
        html += '';
        $('#sect_sqt_rfi_b').append(html);
    }
    function add_option_b_rfq($option) {
        var html = '<div class="form-check d-inline-flex option_b_rfq"><input class="form-check-input" type="checkbox" id="formCheck-3" disabled=""><label class="form-check-label" for="formCheck-3"><input value="' + $option + '" placeholder="' + $option + '" class="option_input_rfq" type="text" style="margin-left: 10px;"></label></div>';
        html += '';
        $('#sect_sqt_rfq_b').append(html);
    }
    
   
    $(document).on('click', '.rfqqst_item', function() {
        var proceed = confirm("êtes-vous sûr de vouloir supprimer cette question ?");
        if (proceed) {
            $(this).closest('tr').remove();
        }
    });
    
    $(document).on('click', '.rfiqst_item', function() {
        var proceed = confirm("êtes-vous sûr de vouloir supprimer cette question ?");
        if (proceed) {
            $(this).closest('tr').remove();
        }
    });
    
    
    $(document).on('click', '.add', function() {
        var html = '<div class="option_rfi" style="font-size: 19px;height: auto;"><div class="form-check text-start" style="margin-left: 29%;width: 26%;min-width: 150px;margin-bottom: 0px;"><input class="form-check-input" type="radio" id="formCheck-1" disabled=""><label class="form-check-label" for="formCheck-1" style="width: 100%;"><input class="option_input_rfi" type="text" style="width: 100%;" placeholder="Oui"></label></div><span style="margin-top: 0px;padding-top: 0px;width: 51px;"></span></div>';
        html += '';
        $('#sect_sqt_rfi').append(html);
    });
    
    
    $(document).on('click', '.add', function() {
        var html = '<div class="option_rfq" style="font-size: 19px;height: auto;"><div class="form-check text-start" style="margin-left: 29%;width: 26%;min-width: 150px;margin-bottom: 0px;"><input class="form-check-input" type="radio" id="formCheck-1" disabled=""><label class="form-check-label" for="formCheck-1" style="width: 100%;"><input class="option_input_rfq" type="text" style="width: 100%;" placeholder="Oui"></label></div><span style="margin-top: 0px;padding-top: 0px;width: 51px;"></span></div>';
        html += '';
        $('#sect_sqt_rfq').append(html);
    });
    
    
    $(document).on('click', '.add_b', function() {
        var html = '<div class="form-check d-inline-flex option_b_rfi"><input class="form-check-input" type="checkbox" id="formCheck-3" disabled=""><label class="form-check-label" for="formCheck-3"><input class="option_input_rfi" type="text" style="margin-left: 10px;"></label></div>';
        html += '';
        $('#sect_sqt_rfi_b').append(html);
    });
    
    $(document).on('click', '.add_b', function() {
        var html = '<div class="form-check d-inline-flex option_b_rfq"><input class="form-check-input" type="checkbox" id="formCheck-3" disabled=""><label class="form-check-label" for="formCheck-3"><input class="option_input_rfq" type="text" style="margin-left: 10px;"></label></div>';
        html += '';
        $('#sect_sqt_rfq_b').append(html);
    });
    $(document).on('click', '.remove', function() {
        $('#sect_sqt_rfi .option_rfi:last').remove()
    });
    
    $(document).on('click', '.remove', function() {
        $('#sect_sqt_rfq .option_rfq:last').remove()
    });
    
    $(document).on('click', '.remove_b', function() {
        $('#sect_sqt_rfi_b .option_b_rfi:last').remove()
    });
    
    
    $(document).on('click', '.remove_b', function() {
        $('#sect_sqt_rfq_b .option_b_rfq:last').remove()
    });
    
    </script>

    @endsection