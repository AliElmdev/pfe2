@extends('chef.dashboard')

@section('contenuDashboardChef')

<body id="page-top" style="font-family: Roboto, sans-serif;border-color: rgb(159,159,159);">
    <div id="wrapper">
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
                                        <button class="btn btn-primary annuler" type="submit">Annuler</button>
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
                                            <th>description </th>
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
                                                    autofocus="autofocus" required="" class="reponse" disabled
                                                    value="{{$list_marches_information->title}}">
                                            </td>
                                            <td> <input type="text" id="reponse_description" name="description"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="reponse" disabled
                                                    value="{{$list_marches_information->description}}">
                                            </td>
                                            <td> <input type="date" id="reponse_limit_date" name="limit_date"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="reponse" disabled
                                                    value="{{$list_marches_information->limit_date}}">
                                            </td>
                                            <td>
                                                <input type="date" id="reponse_date_affichage" name="date_affichage"
                                                    style="border: none;max-width: 100%; text-align: center;"
                                                    autofocus="autofocus" required=""
                                                    value="{{$list_marches_information->affichage_date}}"
                                                    class="reponse" disabled>
                                            </td>

                                            <td>

                                                <div id="dataTable_length" class="dataTables_length"
                                                    aria-controls="dataTable" class="chosen form-select">
                                                    <select class="d-inline-block form-select form-select-sm"
                                                        name="categorie" id="reponse_categorie" class="reponse"
                                                        disabled>
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
                                                <label for="c_charge" style="margin: -40% ">
                                                    <i style="padding-left: 6%"><img
                                                            src="https://img.icons8.com/ios-glyphs/30/000000/pdf-2.png" /></i>
                                                </label>

                                                <input type="file" class="reponse" name="c_charge" id="c_charge"
                                                    disabled hidden>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div class="card-header py-3" style="padding-top: 50%;">
                                <p class="text-uppercase text-primary m-0 fw-bold"
                                    style="text-align: center;color: blue">
                                    Des Question RFQ DU MARCHES
                                </p>
                            </div>


                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info"
                                style="border-radius: 10px;border-width: 1px;border-style: solid;">
                                <table class="table my-0" id="dataTable">
                                    <thead style="text-align: center;background: #93d1e4;">

                                        <tr>
                                            <th>Nom de produit</th>
                                            <th> Commentaire</th>
                                            <th> Quantité</th>
                                            <th> Unité</th>
                                            <th> Services/Produit</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_produits as $item)
                                        <tr align="center">
                                            <td>
                                                <input type="text" id="produit" name="produit"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="reponse" disabled
                                                    value="{{$item->nom}}">
                                            </td>
                                            <td>
                                                <input type="text" id="produit_descption" name="produit_descption"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="reponse" disabled
                                                    value="{{$item->commentaire}}">
                                            </td>
                                            <td>
                                                <input type="number" id="produit_qte" name="produit_qte"
                                                    style="border: none;max-width: 100%;text-align: center;"
                                                    autofocus="autofocus" required="" class="reponse" disabled
                                                    value="{{$item->qte}}">
                                            </td>
                                            <td>

                                                <div id="dataTable_length" class="dataTables_length"
                                                    aria-controls="dataTable" class="chosen form-select">
                                                    <select class="d-inline-block form-select form-select-sm"
                                                        name="unite" id="unite" class="reponse" disabled>
                                                        @if ($item->unit =='m')
                                                        <option value="m" selected>
                                                            metre
                                                        </option>
                                                        <option value="kg">
                                                            kilogram
                                                        </option>
                                                        <option value="u">
                                                            unite
                                                        </option>
                                                        @elseif ($item->unit =='kg')
                                                        <option value="m">
                                                            metre
                                                        </option>
                                                        <option value="kg" selected>
                                                            kilogram
                                                        </option>
                                                        <option value="u">
                                                            unite
                                                        </option>
                                                        @elseif ($item->unit =='u')
                                                        <option value="m">
                                                            metre
                                                        </option>
                                                        <option value="kg">
                                                            kilogram
                                                        </option>
                                                        <option value="u" selected>
                                                            unite
                                                        </option>
                                                        @endif
                                                    </select>
                                                </div>

                                            </td>
                                            <td>
                                                <div id="dataTable_length" class="dataTables_length"
                                                    aria-controls="dataTable" class="chosen form-select">
                                                    <select class="d-inline-block form-select form-select-sm"
                                                        name="categorie" id="reponse" class="reponse">
                                                        @if ($item->serv_prod =='service')
                                                        <option value="service" selected>
                                                            service
                                                        </option>
                                                        <option value="kg">
                                                            produit
                                                        </option>

                                                        @elseif ($item->serv_prod =='produit')
                                                        <option value="service">
                                                            service
                                                        </option>
                                                        <option value="kg" selected>
                                                            produit
                                                        </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <br>
                                <button class="btn btn-primary annuler" type="submit">Annuler</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function btn_modifer()
        {
            if($(".enregister").is(":hidden"))
            { 
                $(".enregister").show();
                $(".modifer").hide();
                $(".reponse").prop("disabled",false );
                $("#reponse_categorie").removeAttr('disabled');
                $("#reponse_unite").removeAttr('disabled');
            }
            else
            {
            $(".enregister").hide();
             $(".modifer").show(); 
            }
        } 
            
            
        if (window.history.replaceState) 
            { 
                window.history.replaceState( null,null, window.location.href );
             } 
    </script>
    <script src="/assets/bootstrap/js/bootstrap.min.js">
    </script>
    <script src="/assets/js/themeAchatGestionMarches.js"></script>
    @endsection