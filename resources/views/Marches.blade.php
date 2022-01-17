@extends('layouts.page')
@section('content')
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="block-heading" style="background: linear-gradient(rgba(0,0,0,0.33) 0%, #000000), url(&quot;assets/img/mining-exploration-activities.jpg&quot;);height: 230px;width: 100%;">
                <h1 class="display-6" style="color: rgb(255,255,255);">Opportunités <br></h1>
            </div>
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-none d-md-block">
                                <div class="filters">
                                    <div class="filter-item">
                                        <h3><strong>Domaines</strong></h3>
                                        <select class="chosen form-select"  onchange="filterdomaine(this)" required="" style="color: #000000;width: 100%;">
                                            <option value="all">Tous</option>
                                            @foreach ($list_domaines  as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="filter-item">
                                        <h3><strong>Catégories</strong></h3>
                                        <select class="chosen form-select" onchange="filtercategorie(this)" required="" style="color: #000000;width: 100%;">
                                            <option value="all">Tous</option>
                                            @foreach ($list_categories as $item)  
                                                <option class="domain_{{$item->id_domaine}}" value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="filter-item">
                                        <h3><strong>Date limite</strong><br></h3>
                                        <input type="date" class="form-control" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">
                                Filters<i class="icon-arrow-down filter-caret"></i></a>
                                <div class="collapse" id="filters">
                                    <div class="filters">
                                        <div class="filter-item">
                                            <h3><strong>Domaines</strong></h3>
                                            <select class="chosen form-select" required="" style="color: #000000;width: 100%;">
                                                <option ></option>
                                                @foreach ($list_domaines  as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="filter-item">
                                            <h3><strong>Catégories</strong></h3>
                                            <select class="chosen form-select" required="" style="color: #000000;width: 100%;">
                                                <option></option>
                                                @foreach ($list_categories as $item)  
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="filter-item">
                                            <h3><strong>Date limite</strong><br></h3>
                                            <input type="date" class="form-control" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="products">
                                <div class="row g-0">
                                    @foreach ( $list_marches as $item)
                                        @foreach($catg as $key=>$value)
                                            @if($item->id_categorie == $key)
                                                @break;
                                            @endif
                                        @endforeach 
                                    <div class="col-12 col-md-6 col-lg-4 marche_{{$item->id_categorie}} domain_{{$value->id_domaine}}" style="width: 100%;height: 260px;background: rgba(214,51,132,0);margin-bottom: 20px;margin-top: 20px;">
                                        <div class="clean-product-item" style="width: 100%;height: 230px;">
                                            <h5 style="font-weight: bold;">M</h5>
                                            <p>Objet :{{$item->title}}</p>
                                            <p style="font-size: 15px;">Dossier_{{$item->id}}: {{$item->description}}<br></p>
                                            <div class="d-flex">
                                                <span style="font-size: 14px;">
                                                    Date limite de réponse :&nbsp;<br>
                                                </span>
                                                <span style="color: rgb(14,101,0);font-weight: bold;font-size: 14px;">
                                                    {{$item->limit_date}} GMT<br>
                                                </span>
                                            </div>
                                            <div style="height: 20%;margin-left: 70%;margin-top: 10px;">
                                                <a href={{route('marchesunitere',1)}} style="background: var(--bs-blue);color: rgb(255,255,255);padding-right: 20px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;border-radius: 6px;">
                                                    Accéder<br>
                                                </a>
                                            </div>
                                            <hr style="height: 3px;background: var(--bs-blue);color: rgb(33, 37, 41);opacity: 1;margin-top: 18px;">
                                        </div>
                                    </div>
                                    @endforeach  
                                    <nav style="margin-top: 100px;">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">« </span></a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#"> 1 </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"> 2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">»</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script> 
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
    </script>
@endsection


