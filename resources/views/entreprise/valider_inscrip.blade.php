@extends('layouts.page')
@section('content')

<main class="d-flex justify-content-around align-items-center align-content-center" style="height: 90%;background: #e1e1e1;">
    <div style="width: 40%;height: 325px;background: rgba(0,103,255,0.21);border-radius: 10px;min-width: 300px;box-shadow: 2px 1px 8px rgb(126,126,126);">
        <div style="text-align: center;padding-top: 10px;"><i class="fa fa-check" style="font-size: 40px;color: rgb(11,193,33);background: #ffffff;padding: 5px;border-radius: 25px;box-shadow: 0px 0px 6px rgb(0,0,0);"></i></div>
        <div style="margin-top: 40px;">
            <p class="text-center" style="text-align: center;font-family: Roboto, sans-serif;font-size: 21px;padding-right: 10px;padding-left: 10px;">Merci pour votre inscription notre équipe va vérifier vos informations pour valider votre inscription.<br></p>
        </div>
        <div><a href="{{route('Home')}}">
                <p style="text-align: center;margin-top: 57px;"><i class="fa fa-caret-square-o-left" style="color: rgb(0,0,0);"></i>&nbsp; &nbsp; Revenir a la page d'accueil</p>
            </a></div>
    </div>
</main>

@endsection