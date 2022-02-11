@extends('layouts.page')
@section('content')
    <main style="background: rgba(220,53,69,0);height: 574px;margin-top: 0px;">
        <div style="height: 100px;background: url('/assets/img/gettyimages-1205700615.jpg') bottom / cover;"></div>
        <div style="text-align: center;margin-top: 20px;">
            <h2 style="text-align: center;margin-bottom: 30px;">Ouverture Commercial</h2><select class="type" style="height: 30px;border-radius: 13px;width: 169px;" onchange="myfunction();">
                <optgroup label="Type de selection">
                    <option value=""></option>
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
                            <th id="trs-hd-3" class="col-lg-3">Entreprise 1<i class="fa fa-trophy" style="margin-left: 10px;display: none;"></i></th>
                            <th id="trs-hd-5" class="col-lg-3">Entreprise 2<i class="fa fa-trophy" style="margin-left: 10px;display: none;"></i></th>
                            <th id="trs-hd-4" class="col-lg-3">Entreprise 3<i class="fa fa-trophy" style="margin-left: 10px;display: none;"></i></th>
                            <th id="trs-hd-2" class="col-lg-3">Entreprise 4<i class="fa fa-trophy" style="margin-left: 10px;display: none;"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-width: 0px;border-bottom-width: 1px;border-bottom-color: rgb(163,165,167);">
                            <td style="font-weight: bold;">#213</td>
                            <td class="produit1" style="text-align: center;">120 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td class="produit1" style="text-align: center;">1200 Dh<br><i class="fa fa-trophy" style="display: none;"></i></td>
                            <td class="produit1" style="text-align: center;">1524 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td class="produit1" style="text-align: center;">12500 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                        </tr>
                        <tr style="border-width: 0px;border-bottom-width: 1px;border-bottom-color: rgb(163,165,167);">
                            <td style="font-weight: bold;">#214</td>
                            <td class="produit1" style="text-align: center;">10 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td class="produit1" style="text-align: center;">125 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td class="produit1" style="text-align: center;">12 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td class="produit1" style="text-align: center;">10250 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                        </tr>
                        <tr style="border-width: 0px;border-bottom-width: 1px;border-bottom-color: rgb(163,165,167);">
                            <td style="font-weight: bold;">#215</td>
                            <td class="produit1" style="text-align: center;">1022 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td class="produit1" style="text-align: center;">2588 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td class="produit1" style="text-align: center;">357 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td class="produit1" style="text-align: center;">852 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="tb_footer">
                            <td>Total :</td>
                            <td>91 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td>51 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td>81 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                            <td style="background: rgb(37,71,106);color: #ffffff;text-align: center;">31 Dh<i class="fa fa-trophy" style="display: none;"></i></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>


    <script>

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