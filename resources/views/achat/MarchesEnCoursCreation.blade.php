@extends('achat.dashboard')
@section('contenu')
<h1 style="text-align: center;">Projets en cours de création</h1>
<div class="container">
    @foreach ($marches as $marche)
    <div class="card card1" style="width: 500px; height: 500px">
        <div class="card-body"><a href="{{route('marcheUnitEnCoursCreations',['id'=>$marche->id])}}">
            <h3 class="card-title"><strong>{{$marche->title}}</strong><br></h3>
            <p class="card-text small">{{$marche->description}}</p>
            <div class="go-corner">
                <div class="go-arrow"><div class="go-arrow">→</div></div>
            </div>
        </div></a>
    </div>
    @endforeach
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
@endsection