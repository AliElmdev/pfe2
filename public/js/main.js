// calcule prix total page postulation
const calcule_prix_totale = (quantite,prix_input,result_display_id)=>{
    const result_display_element = document.getElementById("prix_totale_"+result_display_id);
    const prix_totale = quantite * parseFloat(prix_input.value);
    result_display_element.innerHTML = isNaN(prix_totale) ? '' : prix_totale;
}

// form buliding question

const form_builder = (data)=>{
    const form = ``;

    for(let i = 0 ; i < data.length ; i++){
        switch(data[i].type){
            case "input":
               const f =  input_with_label();
                form+=f;
            break;
            case "":
                break;
        }
    }
    document.getElementById("question_form").innerHTML = form;
}
const make_id = (length) =>{
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}
const input_with_label = (type,label,name)=>{
    const id = make_id(4);
    return `
    <div class="mb-3">
        <label for="${id+label}" class="form-label">Email address</label>
        <input type="${type}" class="form-control" id="${id+label}" name="${name}">
    </div>
    `;
}
const multi_choice = (label,data)=>{
    const id = make_id(4);
}

// //'cr','cm','f','on'
// const choix_multupl = (option,display_id)=>{
//     array1 = option.split(";");
//     let form = "<select   name=\" "+display_id + "\" >" ;
//     array1.forEach(element => {
//         form = form+"<option valeur=\" "+ element+" \" > "+element+ "</option>"
//     });
//     return form;
// }

// const file_input = (display_id)=>{
//     let form = " <input type=\"file\" name=\" "+display_id+ " \" >";
//     return form;
// }

// const on_question = (display_id)=>{
//     let form = "<select   name=\" "+display_id + "\" >"
//     +"<option valeur=\" oui \" > OUI \"</option>" 
//     + " ><option valeur=\" non\" > NON \"</option>" ;
//     return form;
// }

// const cocher_question = (option,display_id)=>{
//    array1 = option.split(";");
//     let form ;
//     array1.forEach(element => {
//        form +=" <input type=\"radio\" name=\" "+element+display_id+ "> "+ "<label >"+ element+"</label>";
//     });
//     return form;
// }







// fonction filtrage domaine categorie
 function filtercategorie(selectObject) {
            $("*[class*='marche_']").hide();
            var value = selectObject.value;
            if(value=='all'){
                $("*[class*='marche_']").show();
            }else{
                var m_categ = '.marche_';
                var m_cat = m_categ.concat(value);
                $(m_cat).show().filter(true);
                //console.log(value);
            }
 }

 function filterdomaine(selectObject) {
            $("*[class*='domain_']").hide();
            var value = selectObject.value;
            if(value=='all'){
                $("*[class*='domain_']").show();
            }else{
                var m_categ = '.domain_';
                var m_cat = m_categ.concat(value);
                $(m_cat).show().filter(true);
                //console.log(value);
            }
 }