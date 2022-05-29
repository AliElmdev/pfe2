@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_entreprise')

@endsection

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Table de Bord</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" style="background: #b92525;"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Télécharger un raport</a>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="font-size: 16px;color: rgb(248,20,20);">CONTRATS EN NÉGOCIATION</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{$NbrContrats}}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-address-book fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span style="font-size: 16px;">Marches En Cours de RFI</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{$NbrRfi}}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-business-time fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span style="font-size: 16px;">Marches En Cours de RFQ</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{$NbrRfq}}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-question-circle fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span style="font-size: 16px;color: rgb(75,103,249);">(Autres)</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>Contenu</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-star-half-alt fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap justify-content-around">
        <div class="list-group" style="min-width: 40%">
            <div class="list-group-item active text-center">
                <b class="list-group-item-heading">RFI</b>
                {{-- <p class="list-group-item-text">
                    Lorem ipsum dolor 
                </p> --}}
            </div>
            @foreach ($listofrfi as $rfi)
            <a href="#">
                <div class="list-group-item ">
                    <b class="list-group-item-heading">{{str_limit($rfi->title, $limit = 80, $end = '...')}}</b>
                    <p class="list-group-item-text">
                        {{str_limit($rfi->description, $limit = 100, $end = '...')}} 
                    </p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="list-group" style="min-width: 40%">
            <div class="list-group-item active text-center">
                <b class="list-group-item-heading">RFQ</b>
                {{-- <p class="list-group-item-text">
                    Lorem ipsum dolor 
                </p> --}}
            </div>
            @foreach ($listofrfq as $rfq)
            <a href="">
                <div class="list-group-item ">
                    <b class="list-group-item-heading">{{str_limit($rfq->title, $limit = 80, $end = '...')}}</b>
                    <p class="list-group-item-text">
                        {{str_limit($rfq->description, $limit = 100, $end = '...')}} 
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <style>
        .list-group {
            max-height: 300px;
            margin-bottom: 10px;
            overflow:scroll;
            -webkit-overflow-scrolling: touch;
        }
        .list-group .list-group-item:first-child, .list-group .list-group-item:last-child {
            border-radius: 0;
        }
    </style> 
    <script>
        (function($){
            $(window).on("load",function(){
                $(".list-group").mCustomScrollbar({
                theme:"dark"
                });
            });
        })(jQuery);
    </script>
</div>
</div>
@endsection