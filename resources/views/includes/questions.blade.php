    <div id="Fome_Apply">
        <div id="Questions_RFI">
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
                                <th id="trs-hd-9" class="col-lg-3" style="width: 500px;">Section</th>
                                <th id="trs-hd-8" class="col-lg-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions_RFI_marche as $question)
                                <tr>
                                    <th>{{$question->question}}</th>
                                    <th>{{$question->description}}</th>
                                    <th>{{$question->type}}</th>
                                    <th>{{$question->options}}</th>
                                    <th>{{$question->section_id}}</th>
                                    <th></th>
                                </tr>
                            @endforeach
                            <tr class="warning no-result">
                                <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <section style="text-align: right;padding: 50px;"><button class="btn btn-primary btn_qts_rfi_rfq mb-5" type="button" onclick="add_RFI_qst()">Ajouter une question<i class="fa fa-caret-square-o-down"></i></button>
                    <div>
                        <div id="rfinv_qst_rfi" style="display:none;">
                            <h4 style="text-align: center;background: rgba(37,71,106,0.56);color: rgb(255,255,255);">Ajouter Questions</h4>
                            <div class="d-flex justify-content-between"><select class="chosen" required="" style="color: #232323;width: 69%;margin: 0;" onchange="myFunctionRFI()">
                                    <option value="0"></option>
                                    @foreach ($questions_RFI as $question)
                                        <option value="{{$question->id}}">{{$question->question}}</option>
                                    @endforeach
                                    <option selected="selected" value="0">Nouvelle Question</option>
                                </select><select onclick="changetype_RFI()" class="types_qst_RFI" style="width: 29%;margin: 0;">
                                    <optgroup label="Types de questions">
                                        <option value="cm" selected="">Choix multiple</option>
                                        <option value="f">Fichier</option>
                                        <option value="cr">Court réponse</option>
                                        <option value="on">Oui / Non</option>
                                    </optgroup>
                                </select></div>
                        </div>
                        <div class="text-center rfinv_cr" style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                            <div><span>Question :&nbsp;</span><input class="rfiqstcr_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                            <div><span>Description :&nbsp;</span><input class="rfidesccr_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                            <div>
                                <span>Section :&nbsp;</span>
                                <select class="section_rfiqst_cr_input" style="width: 35%;margin: 0; margin-top:2%;">
                                    <optgroup label="Section de question">
                                        @foreach ($sections_RFI as $section)
                                        <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <button onclick="Annuler_RFI()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                            <button onclick="Ajouter_RFI()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                        </div>
                        <div class="text-center rfinv_f" style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                            <div><span>Question :&nbsp;</span><input class="rfiqstf_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                            <div><span>Description :&nbsp;</span><input class="rfidescf_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                            <div>
                                <span>Section :&nbsp;</span>
                                <select class="section_rfiqst_f_input" style="width: 35%;margin: 0; margin-top:2%;">
                                    <optgroup label="Section de question">
                                        @foreach ($sections_RFI as $section)
                                        <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <button onclick="Annuler_RFI()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button><button onclick="Ajouter_RFI()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                        </div>
                        <div class="text-center rfinv_on" style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                            <div><span>Question :&nbsp;</span><input class="rfiqston_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                            <div><span>Description :&nbsp;</span><input class="rfidescon_input" type="text" style="width: 79%;margin-top: 10px;"></div>
                            <div>
                                <span>Section :&nbsp;</span>
                                <select class="section_rfiqst_on_input" style="width: 35%;margin: 0; margin-top:2%;">
                                    <optgroup label="Section de question">
                                        @foreach ($sections_RFI as $section)
                                        <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div style="margin-top: 30px;">
                                <h5 class="text-start" style="padding-left: 36%;">Options :</h5>
                                <div id="sect_sqt_rfi">
                                    
                                </div>
                                <button class="btn btn-primary add" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i class="fa fa-plus" style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button class="btn btn-primary remove" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i class="fa fa-remove" style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button>
                            </div>
                            <button onclick="Annuler_RFI()" class="btn btn-primary add_nvl_qst_rfi" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                            <button onclick="Ajouter_RFI()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                        </div>
                        <div class="text-center rfinv_cm" style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                            <div><span>Question :&nbsp;</span><input class="rfiqstcm_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                            <div><span>Description :&nbsp;</span><input class="rfidesccm_input" type="text" style="width: 79%;margin-top: 10px;"></div>
                            <div>
                                <span>Section :&nbsp;</span>
                                <select class="section_rfiqst_cm_input" style="width: 35%;margin: 0; margin-top:2%;">
                                    <optgroup label="Section de question">
                                        @foreach ($sections_RFI as $section)
                                        <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div style="margin-top: 30px;">
                                <h5 class="text-start" style="padding-left: 36%;">Options :</h5>
                                <div id="sect_sqt_rfi_b">
                                    
                                </div>
                                <span style="margin-top: 0px;padding-top: 0px;width: 51px;"><button class="btn btn-primary add_b" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i class="fa fa-plus" style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button class="btn btn-primary remove_b" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i class="fa fa-remove" style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button></span>
                            </div>
                            <button onclick="Annuler_RFI()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                            <button onclick="Ajouter_RFI()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                        </div>
                    </div>
                </section>
            </section>
        </div>
        <div id="Questions_RFQ">
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
                                <th id="trs-hd-12" class="col-lg-3" style="width: 500px;">Options</th>
                                <th id="trs-hd-15" class="col-lg-3" style="width: 500px;">Section</th>
                                <th id="trs-hd-10" class="col-lg-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions_RFQ_marche as $question)
                                <tr>
                                    <th>{{$question->question}}</th>
                                    <th>{{$question->description}}</th>
                                    <th>{{$question->type}}</th>
                                    <th>{{$question->options}}</th>
                                    <th>{{$question->section_id}}</th>
                                    <th></th>
                                </tr>
                            @endforeach
                            <tr class="warning no-result">
                                <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <section style="text-align: right;padding: 50px;">
                    <button class="btn btn-primary btn_qts_rfi_rfq" type="button" onclick="add_RFQ_qst()">Ajouter une question<i class="fa fa-caret-square-o-down"></i>
                    </button>
                </section>
                <div>
                    <div id="rfqnv_qst_rfq" style="display:none;">
                        <h4 style="text-align: center;background: rgba(37,71,106,0.56);color: rgb(255,255,255);">Ajouter Questions</h4>
                        <div class="d-flex justify-content-between"><select class="chosen" required="" style="color: #232323;width: 69%;margin: 0;" onchange="myFunctionRFQ()">
                                <option value="0"></option>
                                @foreach ($questions_RFQ as $question)
                                    <option value="{{$question->id}}">{{$question->question}}</option>
                                @endforeach
                                <option selected="selected" value="0">Nouvelle Question</option>
                            </select><select onclick="changetype_RFQ()" class="types_qst_RFQ" style="width: 29%;margin: 0;">
                                <optgroup label="Types de questions">
                                    <option value="cm" selected="">Choix multiple</option>
                                    <option value="f">Fichier</option>
                                    <option value="cr">Court réponse</option>
                                    <option value="on">Oui / Non</option>
                                </optgroup>
                            </select></div>
                    </div>
                    <div class="text-center rfqnv_cr" style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                        <div><span>Question :&nbsp;</span><input class="rfqqstcr_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                        <div><span>Description :&nbsp;</span><input class="rfqdesccr_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                        <div>
                            <span>Section :&nbsp;</span>
                            <select class="section_rfqqst_cr_input" style="width: 35%;margin: 0; margin-top:2%;">
                                <optgroup label="Section de question">
                                    @foreach ($sections_RFQ as $section)
                                    <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <button onclick="Annuler_RFQ()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                        <button onclick="Ajouter_RFQ()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                    </div>
                    <div class="text-center rfqnv_f" style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                        <div><span>Question :&nbsp;</span><input class="rfqqstf_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                        <div><span>Description :&nbsp;</span><input class="rfqdescf_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                        <div>
                            <span>Section :&nbsp;</span>
                            <select class="section_rfqqst_f_input" style="width: 35%;margin: 0; margin-top:2%;">
                                <optgroup label="Section de question">
                                    @foreach ($sections_RFQ as $section)
                                    <option value="{{$section->id}}">{{$section->nom_section}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <button onclick="Annuler_RFQ()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                        <button onclick="Ajouter_RFQ()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                    </div>
                    <div class="text-center rfqnv_on" style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                        <div><span>Question :&nbsp;</span><input class="rfqqston_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                        <div><span>Description :&nbsp;</span><input class="rfqdescon_input" type="text" style="width: 79%;margin-top: 10px;"></div>
                        <div>
                            <span>Section :&nbsp;</span>
                            <select class="section_rfqqst_on_input" style="width: 35%;margin: 0; margin-top:2%;">
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
                            <button class="btn btn-primary add" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i class="fa fa-plus" style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button class="btn btn-primary remove" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;"><i class="fa fa-remove" style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button>
                        </div>
                        <button onclick="Annuler_RFQ()" class="btn btn-primary add_nvl_qst_rfq" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                        <button onclick="Ajouter_RFQ()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                    </div>
                    <div class="text-center rfqnv_cm" style="display:none;background: rgba(37,71,106,0.15);margin: 0px;margin-top: 20px;">
                        <div><span>Question :&nbsp;</span><input class="rfqqstcm_input" type="text" style="width: 80%;margin-top: 10px;"></div>
                        <div><span>Description :&nbsp;</span><input class="rfqdesccm_input" type="text" style="width: 79%;margin-top: 10px;"></div>
                        <div>
                            <span>Section :&nbsp;</span>
                            <select class="section_rfqqst_cm_input" style="width: 35%;margin: 0; margin-top:2%;">
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
                            <span style="margin-top: 0px;padding-top: 0px;width: 51px;"><button class="btn btn-primary add_b" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i class="fa fa-plus" style="color: rgb(0,183,62);font-size: 19px;margin-right: 20px;"></i></button><button class="btn btn-primary remove_b" type="button" style="background: rgba(13,110,253,0);border-width: 0px;padding-bottom: 0px;margin-bottom: 0px;padding-top: 0px;"><i class="fa fa-remove" style="color: rgb(170,0,0);font-size: 19px;margin-right: 20px;border-color: rgb(174,0,0);"></i></button></span>
                        </div>
                        <button onclick="Annuler_RFQ()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Annuler</button>
                        <button onclick="Ajouter_RFQ()" class="btn btn-primary" type="button" style="margin-top: 18px;background: rgba(37,71,106,0.98);border-radius: 10px;">Ajouter</button>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center" id="lancer-le-marche">
            <h1 class="text-start rfi_rfq_title">Lancer le marche</h1>
            <hr style="color: #004979;text-decoration: underline;height: 5px;width: 200px;margin-left: 50px;font-weight: bold;">
            <div><label class="form-label">Date D'affichage :&nbsp;<input name="dateAffichage" type="date" style="color:white;background: rgba(37, 71, 106, 0.56);border-width: 1px;"></label><label class="form-label">&nbsp; &nbsp; &nbsp; Date Limite&nbsp; :&nbsp;<input name="dateLimite" type="date" style="color:white;background: rgba(37, 71, 106, 0.56);border-width: 1px;"></label></div>
        </div>
        <div id="submit_btn" style="text-align: center;margin-top: 20px;"><button class="btn btn-primary" type="submit" style="text-align: center;width: 20%;margin-bottom: 10px;background: rgba(15,42,69,0.98);border-width: 0px;">Envoi</button></div>
    </div>
    
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
        var id_question = $(".chosen").val();
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
        // $('.option').each(function() {
        //     var options += $(this).val();
        //     var options += ';';
        // });
        if (type_qst != 'cr' && type_qst != 'f') {
            options = $.map($('.option_input_rfi'), function(e) { return e.value; }).join(';');
            // values.join(';');
        }
    
        markup = '<tr><td>' + question_input + '<input hidden name="question_input_rfi[]" value="' + question_input + '" /></td><td>' + description_input + '<input hidden name="description_input_rfi[]" value="' + description_input + '" /></td><td>' + type_qst + '<input hidden name="type_input_rfi[]" value="' + type_qst + '" /></td><td>' + options + '<input hidden name="option_input_rfi[]" value="' + options + '" /></td><td>' + section_input + '<input hidden name="section_input_rfi[]" value="' + section_input + '"/></td><td style="text-align: center;"><button class="btn btn-danger rfiqst_item" style="margin-left: 5px;" type="button"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td></tr>'
        tableBody = $("#Questions_RFI table tbody");
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
        $(this).closest('tr').remove();
    });
    
    
    $(document).on('click', '.rfiqst_item', function() {
        $(this).closest('tr').remove();
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>