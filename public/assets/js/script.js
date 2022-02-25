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