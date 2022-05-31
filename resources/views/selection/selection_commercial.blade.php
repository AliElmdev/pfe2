@extends('layouts.dashboard')

@section('navbar')

@endsection

@section('content')

    <main style="background: rgba(220,53,69,0);margin-top: 0px;">
        <form action="{{route('selection_commercial_store',$id )}}" method="post">
        @csrf
        <input name="marche_id" type="number" value="{{$id}}" hidden>
        <div style="height: 100px;background: url('/assets/img/gettyimages-1205700615.jpg') bottom / cover;"></div>
        <div style="text-align: center;margin-top: 20px;">
            <h2 style="text-align: center;margin-bottom: 30px;">Ouverture Commercial</h2>
            <h4 style="text-align: center;margin-bottom: 30px;">Marche #{{$id}}</h4>
            <select name="type_selections"  class="type_selections" style="height: 30px;border-radius: 13px;width: 169px;" onchange="filtre_selection();">
                <option selected disabled class="text-bold">Type de selection :</option>
                <optgroup>
                    <option value="meilleurchoix">Meilleur Choix</option>
                    <option value="moinschere">Moins Chére</option>
                </optgroup>
            </select>
            <select name="type_filtrage" class="type" style="height: 30px;border-radius: 13px;width: 169px;" onchange="myfunction();filtre_selection();">
                <option selected disabled class="text-bold">Filtre de selection :</option>
                <optgroup>
                    <option value="produit">Par Produit</option>
                    <option value="marche">Par Marche</option>
                </optgroup>
            </select>
        </div>
        <div class="col-md-12 search-table-col" style="margin-top: 40px;">
            <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
            <div class="table-responsive table table-hover table-bordered results" id="commercial">
                <table class="table table-hover table-bordered">
                    <thead class="bill-header cs" style="background: rgba(37, 71, 106, 0.56);">
                        <tr>
                            <th id="trs-hd-1" class="col-lg-1">SL. No.</th>
                            @foreach ($list_entreprises as $entreprise)
                            <th id="trs-hd-3" class="col-lg-3">{{$entreprise}}<i class="fa fa-trophy" style="margin-left: 10px;display: none;"></i></th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_reponses_commercials as $kk=>$list_reponses_commercial)
                            <tr style="border-width: 0px;border-bottom-width: 1px;border-bottom-color: rgb(163,165,167);">
                            @foreach ($list_reponses_commercial as $k=>$application)
                            @if ($loop->first)
                                <td style="font-weight: bold;">#{{$kk}} <span class="text-secondary h6 pl-2">({{$list_qte[$kk]}}u)</span></td>
                            @else
                                <td class="produit1" style="text-align: center;">{{$application}} Dh/u <i class="fa fa-trophy" style="display: none;"></i></td>
                            @endif
                            @endforeach
                            </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr class="tb_footer">
                            @foreach ($total_price as $total)
                            @if ($loop->first)
                                <td>Total :</td>
                            @else
                                <td style="background: rgb(37,71,106);color: #ffffff;text-align: center;">{{$total}} Dh <i class="fa fa-trophy" style="display: none; color:rgb(255, 255, 255);"></i></td>
                            @endif
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="mb-1000">
            <h2 class="text-center">Resultats</h2>
            <table class="table table-hover table-bordered resultats_final_1 text-center">
                <thead class="bill-header cs" style="background: rgba(37, 71, 106, 0.56);">
                    <tr>
                        <th>Produits/Marche</th>
                        <th>Entreprise</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <table class="table table-hover table-bordered resultats_final_2 text-center" style="display: none">
                <thead  class="bill-header cs" style="background: rgba(37, 71, 106, 0.56);">
                    <tr>
                        <th>Produits/Marche</th>
                        <th>Entreprise</th>
                        <th>Prix Total</th>
                        <th>Qualiter/Prix</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div class="text-center"><button class="btn btn-success mb-5 send" style="display: none" type="submit">Confirmer</button></div>
        </div>
    </form>
    </main>


    <script>
        function filtre_selection(){
            if($('.type_selections').val()=='moinschere'){
                if($('.type').val() == 'produit'){
                    $('.send').show();
                    min_prix_produit({{$id}});
                }else{
                    min_prix_marche({{$id}});
                    $('.send').show();
                }
            }else{
                if($('.type').val() == 'produit'){
                    $('.send').show();
                    best_prixqualite_produit({{$id}});
                }else{
                    $('.send').show();
                    best_prixqualite_marche({{$id}});
                }
            }
        }

        function min_prix_produit($id_marche){ 

            $('.resultats_final_2').hide();
            $('.resultats_final_1').show();

            $('.resultats_final_1 tbody').text('');
            // var url = "{{url('/test/2')}}";
            var url1 = "/min_prix_produit/"+$id_marche;
            $.get(url1, function(response){
                $.each(response, function(k,v) {
                    $('.resultats_final_1 tbody').append("<tr><td>#Produit"+v.produit_id+"</td><td>"+v.id+"</td><td>"+v.prix+" Dh/u</td></tr>");
                });
            });
        }

        function min_prix_marche($id_marche){ 
            $('.resultats_final_2').hide();
            $('.resultats_final_1').show();
            $('.resultats_final_1 tbody').text('');
            // var url = "{{url('/test/2')}}";
            var url1 = "/min_prix_marche/"+$id_marche;
            $.get(url1, function(response){
                $('.resultats_final_1 tbody').append("<tr><td>#Marche"+response.marche_id+"</td><td>"+response.entreprise_id+"</td><td>"+response.prix_total+" Dh/u</td></tr>");
            });
        }
        
        function best_prixqualite_produit($id_marche){ 
            $('.resultats_final_1').hide();
            $('.resultats_final_2').show();

            $('.resultats_final_2 tbody').text('');
            // var url = "{{url('/test/2')}}";
            var url1 = "/best_prixqualite_produit/"+$id_marche;
            $.get(url1, function(response){
                $.each(response, function(k,v) {
                    $('.resultats_final_2 tbody').append("<tr><td>#Produit"+v.produit_id+"</td><td>"+v.entreprise_id+"</td><td>"+(v.prix)+"Dh</td><td>"+v.qualiter_prix+"%</td></tr>");
                });
            });
        }

        function best_prixqualite_marche($id_marche){ 
            $('.resultats_final_1').hide();
            $('.resultats_final_2').show();

            $('.resultats_final_2 tbody').text('');
            // var url = "{{url('/test/2')}}";
            var url1 = "/best_prixqualite_marche/"+$id_marche;
            $.get(url1, function(response){
                $('.resultats_final_2 tbody').append("<tr><td>#Marche"+$id_marche+"</td><td>"+response.entreprise_id+"</td><td>"+response.prix_total+"Dh</td><td>"+response.qualiter_prix.toFixed(3)+"%</td></tr>");
            });
        }
        

    </script>

    <script>

    const tbody = document.querySelector('tbody');
    tbody.addEventListener('click', function (e) {
        const cell = e.target.closest('td');
        if (!cell) {return;} // Quit, not clicked on a cell
        const row = cell.parentElement;
        cell.closest("tr").find("td").style.backgroundColor = "#ffffff";
        //$('td').removeClass("max");
        //row.getElementsByTagName('td').style.backgroundColor = "white";
        cell.style.backgroundColor = "#8bce6f";
    });

    function getNum(s) {
        var n = false;
        if (s.length) {
            n = parseInt(s, 10);
        }
        return n;
    }

    function getRowData(t) {
        var r = [],
            n;
        $("td", t).each(function (i, el) {
            n = getNum($(el).text());
            if (i > 0 && n) {
                r.push(n);
            }
        });
        return r;
    }

    $("#commercial tbody tr").each(function (ind, row) {
        const values = getRowData($(row)),
              min = Math.min(...values),
              max = Math.max(...values)
              
        if ($("td", row).eq(0).text() == "Turn time") {
            $(row).addClass("low");
        } else
            if ($("td", row).eq(0).text() == "Take-off weight") {
                $(row).addClass("low");
            }
            else {
                $(row).addClass("high");
            }
        $("td", row).each(function (j, cell) {
            if(!/\d/.test($(cell).text()) && j>0) $(cell).text('')
            if ($(cell).text().replace(/\D/g,'') == min){
                $(this).addClass("max") 
                $(".max i").show();
            }
            if ($(cell).text().replace(/\D/g,'') == max) $(this).addClass("min")
        });
    });


 function myfunction(){
     
     if($(".type").val()=='produit'){
        $(".max i").hide();
        $(".min i").hide();
        $(".max").removeClass( "max" );
        $(".min").removeClass( "min" );
        function getNum(s) {
            var n = false;
            if (s.length) {
                n = parseInt(s, 10);
            }
            return n;
        }

         function getRowData(t) {
             var r = [],
                 n;
             $("td", t).each(function (i, el) {
                 n = getNum($(el).text());
                 if (i > 0 && n) {
                     r.push(n);
                 }
             });
             return r;
         }

         $("#commercial tbody tr").each(function (ind, row) {
             const values = getRowData($(row)),
                   min = Math.min(...values),
                   max = Math.max(...values)

             if ($("td", row).eq(0).text() == "Turn time") {
                 $(row).addClass("low");
             } else
                 if ($("td", row).eq(0).text() == "Take-off weight") {
                     $(row).addClass("low");
                 }
                 else {
                     $(row).addClass("high");
                 }
             $("td", row).each(function (j, cell) {
                 if(!/\d/.test($(cell).text()) && j>0) $(cell).text('')
                 if ($(cell).text().replace(/\D/g,'') == min){
                     $(this).addClass("max") 
                     $(".max i").show();
                 }
                 if ($(cell).text().replace(/\D/g,'') == max) $(this).addClass("min")
             });
         });
   }else{
        $(".max i").hide();
        $(".min i").hide();
        $(".max").removeClass( "max" );
        $(".min").removeClass( "min" );
       $(function () {
         function getNum(s) {
             var n = false;
             if (s.length) {
                 n = parseInt(s, 10);
             }
             return n;
         }

         function getRowData(t) {
             var r = [],
                 n;
             $("td", t).each(function (i, el) {
                 n = getNum($(el).text());
                 if (i > 0 && n) {
                     r.push(n);
                 }
             });
             return r;
         }



         $("#commercial tfoot tr").each(function (ind, row) {
             const values = getRowData($(row)),
                   min = Math.min(...values),
                   max = Math.max(...values)

             if ($("td", row).eq(0).text() == "Turn time") {
                 $(row).addClass("low");
             } else
                 if ($("td", row).eq(0).text() == "Take-off weight") {
                     $(row).addClass("low");
                 }
                 else {
                     $(row).addClass("high");
                 }
             $("td", row).each(function (j, cell) {
                 if(!/\d/.test($(cell).text()) && j>0) $(cell).text('')
                 if ($(cell).text().replace(/\D/g,'') == min){
                     $(this).addClass("max") 
                     $(".max i").show();
                 }
                 if ($(cell).text().replace(/\D/g,'') == max) $(this).addClass("min")
             });
         });
     });
   }   
 }
    </script>

    <style>
        /*.high .min {
    background-color: #e27b7b;
    }*/

    .high .max {
    background-color: #8bce6f;
    }

    .low .min {
    background-color: #8bce6f;
    }
    /*
    .low .max {
    background-color: #e27b7b;
    }*/
    .tb_footer td{
        background: rgb(37,71,106);
        color: #ffffff;
        text-align: center;"
    }

    </style>
@endsection