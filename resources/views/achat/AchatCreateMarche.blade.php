@extends('achat.dashboard')
@section('contenu')
<div style="margin: 25px;padding: 20px;">
    <div>
        <section id="sectCre" style="text-align: center;">
            <h1 class="header_marche_creation" style="font-weight: bold;font-style: italic;">{{$marche->title}}</h1>
            <p class="descrip">{{$marche->description}}</p><button class="btn btn-primary" href="{{$marche->path}}" download="proposed_file_name" style="width: 200px;height: 40px;font-weight: bold;background: #b92525;">Cahier de charge<i class="fa fa-download"></i></button>
        </section>
        <div class="table-responsive table table-hover table-bordered results">
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs" style="background: #b0c163;">
                    <tr>
                        <th id="trs-hd-2" class="col-lg-2">Identificateur</th>
                        <th id="trs-hd-3" class="col-lg-3">Nom Produit / Service</th>
                        <th id="trs-hd-4" class="col-lg-2">Unité de Mesure</th>
                        <th id="trs-hd-5" class="col-lg-2">Quantité de Produits</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                    @foreach ($produits as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nom}}</td>
                            <td>{{$item->unit}}</td>
                            <td>{{$item->qte}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div>
    <h1 class="rfi_rfq_title">RFI</h1>
    <hr style="color: #004979;text-decoration: underline;height: 5px;width: 200px;margin-left: 50px;font-weight: bold;">
    <section>
        <div class="table-responsive table table-hover table-bordered results" style="padding: 50px;">
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-7" class="col-lg-3" style="width: 500px;">Question</th>
                        <th id="trs-hd-8" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                    <tr>
                        <td>Question 1</td>
                        <td style="text-align: center;"><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <section style="text-align: right;padding: 50px;">
            <button class="btn btn-primary btn_qts_rfi_rfq" type="button" onclick="add_RFI_qst()">Ajouter une question<i class="fa fa-caret-square-o-down"></i></button>
        </section>
    </section>
    <div id="nv_qst_rfi" style="display: none; margin-bottom: 50px;">
            <class="card border-dark" style="width: 100%;">
                <div class="card-header bg-dark text-light">
                    <h5 class="m-0" style="text-align: center;">Nouvelle Question</h5>
                </div>
                <div class="card-body 1">
                    <section class="d-flex justify-content-around" style="width: 100%;"><input type="text" placeholder="Question" style="width: 70%;">
                        <select id="select_rfi" onchange="myFunctionRFI()">
                            <optgroup label="Le type de question">
                                <option value="ld" selected="">Liste déroulante</option>
                                <option value="cc">Cases à cocher</option>
                                <option value="cf">Choisir un fichier</option>
                                <option value="rc">Réponse courte</option>
                            </optgroup>
                        </select>
                    </section>
                    <section id="sect_sqt_rfi" style="margin-top: 20px; display: none">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5"><input type="text"></label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" class="addOpRfi" for="formCheck-6"><a href="" style="text-decoration: none; font-color: red;">Ajouter une option</a></label></div>
                    </section>
                </div>
                <div class="d-flex card-footer"><button class="btn btn-dark btn-sm" type="button">&nbsp;Annuler</button><button class="btn btn-outline-dark btn-sm ms-auto" type="button"><i class="fa fa-plus"></i>&nbsp;Ajouter</button></div>
    </div>
<div>
    <h1 class="rfi_rfq_title">RFQ</h1>
    <hr style="color: #004979;text-decoration: underline;height: 5px;width: 200px;margin-left: 50px;font-weight: bold;">
    <section>
        <div class="table-responsive table table-hover table-bordered results" style="padding: 50px;">
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-9" class="col-lg-3" style="width: 500px;">Question</th>
                        <th id="trs-hd-10" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                    <tr>
                        <td>Question 1</td>
                        <td style="text-align: center;"><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <section style="text-align: right;padding: 50px;"><button class="btn btn-primary btn_qts_rfi_rfq" onclick="add_RFQ_qst()" type="button">Ajouter une question<i class="fa fa-caret-square-o-down"></i></button>
        </section>
    </section>
    <div id="nv_qst_rfq" style="display: none;  margin-bottom: 50px;">
        <class="card border-dark" style="width: 100%;">
            <div class="card-header bg-dark text-light">
                <h5 class="m-0" style="text-align: center;">Nouvelle Question</h5>
            </div>
            <div class="card-body 1">
                <section class="d-flex justify-content-around" style="width: 100%;"><input type="text" placeholder="Question" style="width: 70%;">
                    <select id="select_rfq" onchange="myFunctionRFQ()">
                        <optgroup label="Le type de question">
                            <option value="ld" selected="">Liste déroulante</option>
                            <option value="cc">Cases à cocher</option>
                            <option value="cf">Choisir un fichier</option>
                            <option value="rc">Réponse courte</option>
                        </optgroup>
                    </select>
                </section>
                <section id="sect_sqt_rfq" style="margin-top: 20px; display: none">
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5"><input type="text"></label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Ajouter une option</label></div>
                </section>
            </div>
            <div class="d-flex card-footer"><button class="btn btn-dark btn-sm" type="button">&nbsp;Annuler</button><button class="btn btn-outline-dark btn-sm ms-auto" type="button"><i class="fa fa-plus"></i>&nbsp;Ajouter</button></div>
</div>
</div>
<hr style="color: #004979;text-decoration: underline;height: 5px;width: 200px;margin-left: 50px;font-weight: bold;">
<div id="divDates">
    <form method="GET" action="{{route('marcheUnitEnCoursCreation.store')}}">
        @csrf
    <input name="id_marche" value="{{$marche->id}}" style="display: none">
    <section><label for="dateAffichage" class="form-label" style="font-weight: bold;">Date d'affichage</label><input type="date" name="dateAffichage" id="dateAffichage"></section>
    <section><label for="dateLimite" class="form-label" style="font-weight: bold;">Date limite du marché</label><input type="date" name="dateLimite" id="dateLimite"></section>
    <section style="text-align: center;margin-top: 30px; margin-bottom: 30px;"><button class="btn btn-primary" type="submit" style="background: #1b540d;font-weight: bold;width: 150px;">Valider</button></section>
    </form>
</div>
<script>
    
    function add_RFI_qst() {
        var x = document.getElementById("nv_qst_rfi");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function myFunctionRFI() {

        var x = document.getElementById("select_rfi").value;
        var y = document.getElementById('sect_sqt_rfi');
        if(x=='cc'){
            $('#sect_sqt_rfi').show();
        }else
            $('#sect_sqt_rfi').hide();
    }

    function add_RFQ_qst() {
        var x = document.getElementById("nv_qst_rfq");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function myFunctionRFQ() {

var x = document.getElementById("select_rfq").value;
var y = document.getElementById('sect_sqt_rfq');
if(x=='cc'){
    $('#sect_sqt_rfq').show();
}else
    $('#sect_sqt_rfq').hide();
} 
</script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/Dynamic-Table.js"></script>
<script src="/assets/js/Table-With-Search.js"></script>
<script src="/assets/js/-Filterable-Cards-.js"></script>
@endsection