$(document).on('click', '.qst_item', function() {
    $(this).closest('tr').remove();
});

$(document).on('click', '.add', function() {
    var html = '<div class="option" style="font-size: 19px;height: auto;"><div class="form-check text-start" style="margin-left: 29%;width: 26%;min-width: 150px;margin-bottom: 0px;"><input class="form-check-input" type="radio" id="formCheck-1" disabled=""><label class="form-check-label" for="formCheck-1" style="width: 100%;"><input class="option_input" type="text" style="width: 100%;" placeholder="Oui"></label></div><span style="margin-top: 0px;padding-top: 0px;width: 51px;"></span></div>';
    html += '';
    $('#sect_sqt_rfi').append(html);
});

$(document).on('click', '.add_b', function() {
    var html = '<div class="form-check d-inline-flex option_b"><input class="form-check-input" type="checkbox" id="formCheck-3" disabled=""><label class="form-check-label" for="formCheck-3"><input class="option_input" type="text" style="margin-left: 10px;"></label></div>';
    html += '';
    $('#sect_sqt_rfi_b').append(html);
});

$(document).on('click', '.remove', function() {
    //$(this).closest('div').remove();
    // $("#sect_sqt_rfi > div:last-child").remove();
    $('#sect_sqt_rfi .option:last').remove()
});

$(document).on('click', '.remove_b', function() {
    //$(this).closest('div').remove();
    // $("#sect_sqt_rfi > div:last-child").remove();
    $('#sect_sqt_rfi_b .option_b:last').remove()
});

$(".chosen").val(0).select2({
    matcher: function(params, data) {
        if (data.id === "0") { // <-- option value of "Other", always appears in results
            return data;
        } else {
            return $.fn.select2.defaults.defaults.matcher.apply(this, arguments);
        }
    },
});
$('.chosen').val(nl);
//add card to create questions
function add_RFI_qst() {
    var x = document.getElementById("nv_qst_rfi");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
        $("*[class*='nv_']").hide();
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
            $(".types_qst").val(questions[i].type).change();
            var zone_add = ".nv_" + questions[i].type;
            $("*[class*='nv_']").hide();
            $(zone_add).show();
            //Fill inputs with questions template from data base
            var question_input = ".qst" + questions[i].type + "_input";
            var description_input = ".desc" + questions[i].type + "_input";
            var options_input = questions[i].options.split(";");
            $(".option").remove();
            $(".option_b").remove();
            if (questions[i].type == 'cm') {
                for (let index = 0; index < options_input.length; index++) {
                    add_option_b(options_input[index]);
                }
            } else {
                for (let index = 0; index < options_input.length; index++) {
                    add_option(options_input[index]);
                }
            }

            $(question_input).val(questions[i].question);
            $(description_input).val(questions[i].description);
        };
    });
}

function changetype() {
    var type = $(".types_qst").val();
    var zone_add = ".nv_" + type;
    if ($(zone_add).is(":hidden")) {
        $("*[class*='nv_']").hide();
        $(zone_add).show();
    };
}

function Annuler() {
    add_RFI_qst();
}

function Ajouter() {

    var type_qst = $(".types_qst").val();
    var question_input = $(".qst" + type_qst + "_input").val();
    var description_input = $(".desc" + type_qst + "_input").val();
    var options = '';
    // $('.option').each(function() {
    //     var options += $(this).val();
    //     var options += ';';
    // });
    if (type_qst != 'cr' && type_qst != 'f') {
        options = $.map($('.option_input'), function(e) { return e.value; }).join(';');
        // values.join(';');
    }

    markup = '<tr><td>' + question_input + '</td><td>' + description_input + '</td><td>' + type_qst + '</td><td>' + options + '</td><td style="text-align: center;"><button class="btn btn-danger qst_item" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td></tr>'
    tableBody = $("#Questions table tbody");
    tableBody.append(markup);

    add_RFI_qst();
}

function add_option($option) {
    var html = '<div class="option" style="font-size: 19px;height: auto;"><div class="form-check text-start" style="margin-left: 29%;width: 26%;min-width: 150px;margin-bottom: 0px;"><input class="form-check-input" type="radio" id="formCheck-1" disabled=""><label class="form-check-label" for="formCheck-1" style="width: 100%;"><input class="option_input" type="text" style="width: 100%;" value="' + $option + '" placeholder="' + $option + '"></label></div></div>';
    html += '';
    $('#sect_sqt_rfi').append(html);
}

function add_option_b($option) {
    var html = '<div class="form-check d-inline-flex option_b"><input class="form-check-input" type="checkbox" id="formCheck-3" disabled=""><label class="form-check-label" for="formCheck-3"><input value="' + $option + '" placeholder="' + $option + '" class="option_input" type="text" style="margin-left: 10px;"></label></div>';
    html += '';
    $('#sect_sqt_rfi_b').append(html);
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
    if (x == 'cc') {
        $('#sect_sqt_rfq').show();
    } else
        $('#sect_sqt_rfq').hide();
}