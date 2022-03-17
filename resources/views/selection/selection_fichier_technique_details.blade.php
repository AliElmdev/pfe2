@extends('layouts.page')
@section('content')
<div>
    <div class="container-fluid">
        <header>
            <h3 class="text-dark mb-4" style="text-align: center;margin-top: 3%;">{{$marche->title}}</h3>
        </header>
        <div class="card shadow card-rfi">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"><strong>Fichier Technique</strong><br></p>
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
        <form action="{{route('selection_fichierTechnique_accept',['id_marche' => $marche->id, 'id_entreprise' => $entreprise->id,'id_postulation'=> $postulation->id])}}" method="GET">
        <div class="card shadow" style="margin-top: 1%">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Evaluation des produits</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produits as $produit)
                                        <tr>
                                            <td>{{$produit->nom}}</td>
                                            <td>
                                                <select name="produit_Note{{$produit->id}}" style="width: 50%;">
                                                    <optgroup label="Choisir une note">
                                                        
                                                        <option value="O">0/10</option>
                                                        <option value="1">1/10</option>
                                                        <option value="2">2/10</option>
                                                        <option value="3">3/10</option>
                                                        <option value="4">4/10</option>
                                                        <option value="5">5/10</option>
                                                        <option value="6">6/10</option>
                                                        <option value="7">7/10</option>
                                                        <option value="8">8/10</option>
                                                        <option value="9">9/10</option>
                                                        <option value="10">10/10</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Produit</strong></td>
                                        <td><strong>Note</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
        </div>

            <input type="hidden" name="id_postulation" value="{{$postulation->id}}">
            <input type="hidden" name="id_marche" value="{{$marche->id}}">
            <button class="btn btn-primary btn-btn" type="submit" style="background: rgb(37,128,15);">Accepter</button>
        </form>

        {{-- <div style="display: flex; flex-direction:row; flex-wrap:wrap; margin-top:3%; margin-bottom:3%; margin-left:35%;">
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
        </div> --}}
</div>
</div>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/themeRfi.js"></script>
@endsection