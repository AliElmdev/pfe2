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
                        <th id="trs-hd-1" class="col-lg-3" style="width: 500px;">Description</th>
                        <th id="trs-hd-11" class="col-lg-3" style="width: 500px;">Type de Question</th>
                        <th id="trs-hd-6" class="col-lg-3" style="width: 500px;">Options</th>
                        <th id="trs-hd-8" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                    <tr>
                        <td>Question 1</td>
                        <td>Description 1</td>
                        <td>Oui / Non</td>
                        <td>Oui;Non</td>
                        <td style="text-align: center;"><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <section style="text-align: right;padding: 50px;"><button class="btn btn-primary btn_qts_rfi_rfq" type="button" onclick="add_RFI_qst()">Ajouter une question<i class="fa fa-caret-square-o-down"></i></button>
            <div>
                <div id="nv_qst_rfi" style="display='none';">
                    <h4 style="text-align: center;background: rgba(37,71,106,0.56);color: rgb(255,255,255);">Ajouter Questions</h4>
                    <div class="d-flex justify-content-between"><select class="chosen" required="" style="color: #232323;width: 69%;margin: 0;" onchange="myFunctionRFI()">
                            <option value="qst1">qst1</option>
                            <option value="qst2">qst2</option>
                            <option value="qst3">qst3</option>
                            <option value="qst4">qst4</option>
                            <option value="0">Nouvelle Question</option>
                        </select><select style="width: 29%;margin: 0;">
                            <optgroup label="Types de questions">
                                <option value="cm" selected="">Choix multiple</option>
                                <option value="f">Fichier</option>
                                <option value="cr">court reponse</option>
                                <option value="on">Oui / Non</option>
                            </optgroup>
                        </select></div>
                </div>
                <div class="text-center nv_cr" style="display='none';background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                    <div><span>Question :&nbsp;</span><input type="text" style="width: 80%;margin-top: 10px;"></div>
                    <div><span>Description :&nbsp;</span><input type="text" style="width: 80%;margin-top: 10px;"></div><button class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button><button class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                </div>
                <div class="text-center nv_cr" style="display='none';background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                    <div><span>Question :&nbsp;</span><input type="text" style="width: 80%;margin-top: 10px;"></div>
                    <div><span>Description :&nbsp;</span><input type="text" style="width: 79%;margin-top: 10px;"></div>
                    <div style="margin-top: 30px;">
                        <h5 class="text-start" style="padding-left: 36%;">Options :</h5>
                        <div style="font-size: 19px;height: auto;">
                            <div class="form-check text-start" style="margin-left: 29%;width: 26%;min-width: 150px;margin-bottom: 0px;"><input class="form-check-input" type="radio" id="formCheck-1" disabled=""><label class="form-check-label" for="formCheck-1" style="width: 100%;"><input type="text" style="width: 100%;" placeholder="Oui"></label></div><span style="margin-top: 0px;padding-top: 0px;width: 51px;"></span>
                        </div>
                        <div style="font-size: 19px;height: auto;">
                            <div class="form-check text-start" style="margin-left: 29%;width: 26%;min-width: 150px;margin-bottom: 0px;"><input class="form-check-input" type="radio" id="formCheck-2" disabled=""><label class="form-check-label" for="formCheck-2" style="width: 100%;"><input type="text" style="width: 100%;" placeholder="Non"></label></div><span style="margin-top: 0px;padding-top: 0px;width: 51px;"><button class="btn btn-primary" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i class="fa fa-plus" style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button class="btn btn-primary" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i class="fa fa-remove" style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button></span>
                        </div>
                    </div><button class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button><button class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                </div>
                <div class="text-center nv_cr" style="display='none';background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                    <div><span>Question :&nbsp;</span><input type="text" style="width: 80%;margin-top: 10px;"></div>
                    <div><span>Description :&nbsp;</span><input type="text" style="width: 79%;margin-top: 10px;"></div>
                    <div style="margin-top: 30px;">
                        <h5 class="text-start" style="padding-left: 36%;">Options :</h5>
                        <div>
                            <div class="form-check d-inline-flex"><input class="form-check-input" type="checkbox" id="formCheck-3" disabled=""><label class="form-check-label" for="formCheck-3"><input type="text" style="margin-left: 10px;"></label></div>
                        </div><span style="margin-top: 0px;padding-top: 0px;width: 51px;"><button class="btn btn-primary" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i class="fa fa-plus" style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button class="btn btn-primary" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i class="fa fa-remove" style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button></span>
                    </div><button class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button><button class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                </div>
            </div>
        </section>
    </section>
</div>
<div>
    <h1 class="rfi_rfq_title">RFQ</h1>
    <hr style="color: #004979;text-decoration: underline;height: 5px;width: 200px;margin-left: 50px;font-weight: bold;">
    <section>
        <div class="table-responsive table table-hover table-bordered results" style="padding: 50px;">
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs" style="background: rgba(37, 71, 106, 0.56);">
                    <tr>
                        <th id="trs-hd-9" class="col-lg-3" style="width: 500px;">Question</th>
                        <th id="trs-hd-14" class="col-lg-3" style="width: 500px;">Descriptions</th>
                        <th id="trs-hd-13" class="col-lg-3" style="width: 500px;">Types</th>
                        <th id="trs-hd-12" class="col-lg-3" style="width: 500px;">OPtions</th>
                        <th id="trs-hd-10" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                    <tr>
                        <td>Question 1</td>
                        <td>Description 1</td>
                        <td>Choic Multiples</td>
                        <td>opt1;opt2;opt3</td>
                        <td style="text-align: center;"><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <section style="text-align: right;padding: 50px;"><button class="btn btn-primary btn_qts_rfi_rfq" type="button">Ajouter une question<i class="fa fa-caret-square-o-down"></i></button></section>
    </section>
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
    //add card to create questions
function add_RFI_qst() {
        var x = document.getElementById("nv_qst_rfi");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
//choose case a cocher
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

$(document).on('click', '.add_nvl_qst_rfi', function(){
    var html = '<div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5"><input type="text"></label><button class="remove"><i class="fas fa-trash"></i></button></div>';
    html += '';
    $('#sect_sqt_rfi').append(html);
    });
$(document).on('click', '.remove', function(){
    $(this).closest('div').remove();
    });
    $(".chosen").val(1).select2({
    matcher: function(params, data) {
        if (data.id === "0") { // <-- option value of "Other", always appears in results
            return data;
        } else {
            return $.fn.select2.defaults.defaults.matcher.apply(this, arguments);
        }
    },
});

$(".chosen").val(1).select2({
    matcher: function(params, data) {
        if (data.id === "0") { // <-- option value of "Other", always appears in results
            return data;
        } else {
            return $.fn.select2.defaults.defaults.matcher.apply(this, arguments);
        }
    },
});
</script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/Dynamic-Table.js"></script>
<script src="/assets/js/Table-With-Search.js"></script>
<script src="/assets/js/-Filterable-Cards-.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@endsection