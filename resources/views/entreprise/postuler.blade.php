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

        <form style="max-width:100%" action="{{route('postulation',$marche[0]->id)}}" method="POST">    
            @csrf
            <input type="text" name="marche_id" value="{{$marche[0]->id}}" hidden>
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
                    
                    <p style="font-family: Roboto, sans-serif;">
                        Dossier :<a href="https://esuppliers.ocpgroup.org/esop/toolkit/negotiation/tnd/detailTender.do?selectedCommandName=SETTINGS&amp;tenderCode=tender_45283&amp;from=menu"><strong>Dossier_48865</strong></a>-
                        Acquisition d'un logiciel d'Audit et de Reporting pour les plateformes Active<br />
                    </p>
                    <p style="font-family: Roboto, sans-serif;">Dernière réponse envoyée le: 20/02/2022<br /></p>
                </div>
            </div>
            <div class="text-warning d-flex d-lg-flex flex-row justify-content-end align-self-end" style="margin-right: 83px; margin-top: 15px;">
                <button class="btn btn-primary modifer" type="button" style="margin-right: 9px; background: var(--bs-success); display:block;" onclick="btn_modifer();">Modifier</button><button class="btn btn-primary enregister" type="submit" style="margin-right: 9px; background: var(--bs-success);display:none" onclick="btn_modifer();">Enregister</button><button class="btn btn-primary annuler" type="submit" style="background: var(--bs-green);" onclick="annuler();">Annuler</button>
            </div>
        

            <h1 class="text-center" style="font-family: Roboto, sans-serif; background: var(--bs-green); color: rgb(255, 255, 255); width: 20%; margin-right: 40%; margin-left: 40%; border-radius: 45px; margin-top: 25px;">RFI</h1>
            @foreach ($b_sections as $b_section)
                <div style="margin-top: 26px;">
                    <h2 style="font-family: Roboto, sans-serif; margin-left: 17px; font-size: 21.128px;"><strong>{{$b_section->nom}}</strong><br /></h2>
                    <div class="accordion" role="tablist" id="accordion-{{$b_section->id}}">
                        @foreach ($b_section->section as $section)
                            <div class="accordion-item">
                                <h2 class="accordion-header panel-title mb-0" role="tab">
                                    <button type="button" class="accordion-button collapsed collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-{{$b_section->id}} .item-{{$section->id}}" aria-expanded="true" aria-controls="accordion-{{$b_section->id}} .item-{{$section->id}}">
                                        <i class="fa fa-comments"></i>{{$section->nom_section}}<br />
                                    </button>
                                </h2>
                                <div class="accordion-collapse collapse item-{{$section->id}}" role="tabpanel" data-bs-parent="#accordion-{{$b_section->id}}">
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
                                                    @foreach ($section->question as $question)
                                                        @if($question->marche_id == $marche[0]->id)
                                                            <tr>
                                                                @if($question->type == 'f')
                                                                        <td>{{$question->question}}</td>
                                                                        <td><input name="reponseqst_{{$question->id}}" type="file" class="form-costum reponse_l reponseqst_{{$question->id}}" disabled /></td>
                                                                @elseif($question->type == 'cm')
                                                                    <td>{{$question->question}}</td>
                                                                    <td>
                                                                        <select name="reponseqst_{{$question->id}}" class="reponse_l reponseqst_{{$question->id}}" style="height: 25.8px; width: 134px;" disabled>
                                                                            <optgroup label="Oui / NON"><option value="0" selected=""></option>
                                                                            @foreach(explode(';', $question->options) as $opt) 
                                                                                <option value="{{$opt}}">{{$opt}}</option>
                                                                            @endforeach
                                                                            </optgroup>
                                                                        </select>
                                                                    </td>
                                                                @elseif($question->type == 'cr')
                                                                    <td>{{$question->question}}</td>
                                                                    <td><input name="reponseqst_{{$question->id}}" type="text" class="form-costum reponse_l reponseqst_{{$question->id}}" disabled /></td>
                                                                @elseif($question->type == 'on')
                                                                    <td>{{$question->question}}</td>
                                                                    <td>
                                                                        <select name="reponseqst_{{$question->id}}" class="reponse_l reponseqst_{{$question->id}}" style="height: 25.8px; width: 134px;" disabled>
                                                                            <optgroup label="Oui / NON"><option value="0" selected=""></option>
                                                                                @foreach(explode(';', $question->options) as $opt) 
                                                                                    <option value="{{$opt}}">{{$opt}}</option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                        </select>
                                                                    </td>
                                                                @endif
                                                            </tr> 
                                                        @endif  
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <h1 class="text-center" style="font-family: Roboto, sans-serif; background: var(--bs-green); color: rgb(255, 255, 255); width: 20%; margin-right: 40%; margin-left: 40%; border-radius: 45px; margin-top: 25px;">RFQ</h1>
            <div style="margin-top: 26px;">
                <div class="accordion" role="tablist" id="accordion-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button type="button" class="accordion-button collapsed collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-3 .item-1" aria-expanded="true" aria-controls="accordion-3 .item-1">
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
                                                <td style="border-width: 0px;"><input class="reponse_l" disabled type="file" /></td>
                                                <td style="border-width: 0px;"></td>
                                            </tr>
                                            <tr>
                                                <td style="border-width: 0px;">Fich Service 1</td>
                                                <td style="border-width: 0px;"><input class="reponse_l" disabled type="file" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header panel-title mb-0" role="tab">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-3 .item-2" aria-expanded="true" aria-controls="accordion-3 .item-2">
                                <i class="fa fa-comments"></i>&nbsp; &nbsp;Commerciale&nbsp; &nbsp;<br />
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse show item-2" role="tabpanel" data-bs-parent="#accordion-3">
                            <div class="accordion-body">
                                <div class="table-responsive" style="margin-left: 2px; margin-right: 25px; border: 2.4px none var(--bs-blue);">
                                    <table class="table">
                                        <thead style="height: 77px;">
                                            <tr style="background: var(--bs-green);text-align:center;">
                                                <th>Identifiant</th>
                                                <th>NOM</th>
                                                <th style="width: 119.262px;">Unité/Mesure</th>
                                                <th>QTé</th>
                                                <th>Comentaire</th>
                                                <th>Type</th>
                                                <th>Devis</th>
                                                <th>Prix</th>
                                                <th>Prix Totale</th>
                                            </tr>
                                        </thead>
                                        <tbody style="padding-left: 10px;">
                                            @foreach ($produits as $produit)
                                                <tr style="text-align:center;">
                                                    <td style="padding-top: 11px; padding-left: 19px;">{{$produit->id}}</td>
                                                    <td>{{$produit->nom}}</td>
                                                    <td>{{$produit->unit}}</td>
                                                    <td>{{$produit->qte}}</td>
                                                    <td>{{$produit->commentaire}}</td>
                                                    <td>
                                                        <select name="type_{{$produit->id}}" class="reponse_l" disabled>
                                                            <optgroup label="Type"><option value="0" selected=""></option><option value="article">Article</option><option value="variante">Variante</option></optgroup>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="devis_{{$produit->id}}" style="height: 22.8px; width: 105.4px;" class="reponse_l" disabled>
                                                            <optgroup label="Type"><option value="0" selected=""></option><option value="2">Euro</option><option value="2">MAD</option></optgroup>
                                                        </select>
                                                    </td>
                                                    <td><input name="prix_{{$produit->id}}" class="reponse_l" disabled onkeyup="calcule_prix_totale({{$produit->qte}},this,{{$produit->id}})" type="number" id={{$produit->id.'prix_input'}} style="width: 77.4px; border-radius: 0px; border-width: 1px; border-style: solid;" /></td>
                                                    <td id="prix_totale_{{$produit->id}}">...................</td>
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
    <script>
        var reponses_questions =  @json($reponses_question);
        var reponses_commercials =  @json($reponses_commercial);

        reponses_questions.forEach(reponse => {
            alert('test');
            var options = reponse.reponse.split(";");
            options.forEach(option => {
                alert(option);
                // var classna = '.reponseqst_'+ reponse.question_id;
                // alert(classna);
                // $(classna).val(option).change();
                $('.reponseqst_2').val('o').change();
            });
        });
        const calcule_prix_totale = (quantite,prix_input,result_display_id)=>{
            const result_display_element = document.getElementById("prix_totale_"+result_display_id);
            const prix_totale = quantite * parseFloat(prix_input.value);
            result_display_element.innerHTML = isNaN(prix_totale) ? '' : prix_totale;
        }
        function btn_modifer(){
            if($(".enregister").is(":hidden")){
                $(".enregister").show();
                $(".modifer").hide();
                $(".reponse_l").prop( "disabled", false );
            }else{
                $(".enregister").hide();
                $(".modifer").show();
            }
        }
    </script>
        {{-- <script src="assets/js/script.min.js"></script> --}}
@endsection