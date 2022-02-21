@extends('layouts.page')
@section('content')
<div>
    <div class="container-fluid">
        <header>
            <h3 class="text-dark mb-4" style="text-align: center;margin-top: 3%;">{{$marche->title}}</h3>
            <div class="card shadow card-rfi">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Fichier Technique</p>
                </div>
                <div class="card-body">
                    <div>
                        
                    </div>
                </div>
            </div>
        </header>
        <div class="card shadow card-rfi">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"><strong>Réponses Questions Téchniques</strong><br></p>
            </div>
            <div class="card-body">
                <div>
                    @foreach ($questions as $qr)
                        <strong>{{$qr->question}}</strong><br>
                        @if ($qr->type == 'f')
                            <a href="{{$qr->reponse}}" download="{{$qr->reponse}}"><button class="btn btn-primary" type="button" style="background: rgb(227,65,65);"><i class="fa fa-download"></i></button></a> 
                        @else
                            <p>{{$qr->reponse}}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div style="display: flex; flex-direction:row; flex-wrap:wrap; margin-top:3%; margin-bottom:3%; margin-left:35%;">
            <form style="margin-right: 2%;" action="{{route('selection_fichierTechnique_refuse',['id_marche' => $marche->id, 'id_entreprise' => $entreprise->id,'id_postulation'=> $postulation->id])}}" method="GET">
                <input type="hidden" name="id_postulation" value="{{$postulation->id}}">
                <input type="hidden" name="id_marche" value="{{$marche->id}}">
                <button class="btn btn-primary btn-btn" type="submit" style="margin-right: 5%;background: rgb(217,28,28);">Refuser</button>
            </form>
            <form action="{{route('selection_fichierTechnique_accept',['id_marche' => $marche->id, 'id_entreprise' => $entreprise->id,'id_postulation'=> $postulation->id])}}" method="GET">
                <input type="hidden" name="id_postulation" value="{{$postulation->id}}">
                <input type="hidden" name="id_marche" value="{{$marche->id}}">
                <button class="btn btn-primary btn-btn" type="submit" style="background: rgb(37,128,15);">Accepter</button>
            </form>
        </div>
</div>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/themeRfi.js"></script>
@endsection