@extends('layouts.dashboard')
@section('navbar')
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Mon compte</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Mes Projets</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mes projets:</h6>
            <a class="collapse-item" href="{{route('create_project')}}">Créer un nouveau projet</a>
            <a class="collapse-item" href="utilities-color.html">En cours</a>
            <a class="collapse-item" href="utilities-border.html">Terminer</a>
            <a class="collapse-item" href="utilities-border.html">Tous les projets</a>
        </div>
    </div>
</li>

@endsection

{{-- @section('title')

@endsection --}}

@section('content')

<div class="container-fluid">
    <form class="bootstrap-form-with-validation" id="insert_form" method="POST" action="{{route('create_project')}}" enctype="multipart/form-data">
        @csrf
        <h2 class="text-center">Crée Nouveau Projet</h2>
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{!! $error !!}</div>
        @endforeach
        <div class="form-group mb-3"><label class="form-label" for="text-input">Titre</label><input class="form-control" type="text" id="text-input" name="titre_input" /></div>
        <div class="form-group mb-3"><label class="form-label" for="password-input">Description</label><textarea class="form-control" name="desc_input"></textarea></div>
        <div class="form-group mb-3">
            <label class="form-label" for="email-input">Categorie</label>
            <select class="custom-select" name="categ_input">
                <optgroup label="This is a group"><option value="1" selected="">This is item 1</option><option value="1">This is item 2</option><option value="1">This is item 3</option></optgroup>
            </select>
        </div>
        <div class="form-group mb-3"><label class="form-label" for="textarea-input">Cachier des charges</label><input class="form-control bg-white" type="file" id="textarea-input" name="file_charge" /></div>
        <div class="form-group mb-3">
            <div class="table-responsive">
                <table class="table" id="item_table">
                    <thead>
                        <tr>
                            <th><strong>Nom</strong><br /></th>
                            <th><strong>Description</strong><br /></th>
                            <th><strong>Serv/Prod</strong><br /></th>
                            <th><strong>Unit/Mesure</strong><br /></th>
                            <th><strong>Quantité</strong><br /></th>
                            <th href="#">
                                <button class="btn btn-primary add" name="add" type="button" style="font-size: 16px; font-weight: bold; background: rgb(0, 177, 39);"><strong>+</strong></button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control" name="nom[]" type="text" /></td>
                            <td><textarea class="form-control" name="description[]" style="height: 34px;"></textarea></td>
                            <td>
                                <select class="custom-select" name="serv_prod[]">
                                    <optgroup label="This is a group"><option value="service" selected="">Service</option><option value="Produit">Produit</option></optgroup>
                                </select>
                            </td>
                            <td>
                                <select class="custom-select" name="unit[]">
                                    <optgroup label="This is a group"><option value="u" selected="">Unit</option><option value="m">Metre</option><option value="kg">KiloGramme</option></optgroup>
                                </select>
                            </td>
                            <td><input class="form-control" name="qte[]" type="number" /></td>
                            <td>
                                <button class="btn btn-primary remove" name="remove" type="button" style="background: rgb(230, 0, 0);"><strong>x</strong></button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group mb-3" style="margin-top: 100px;">
            <button class="btn btn-primary" type="submit" style="font-weight: bold; width: 20%; margin-left: 40%; min-width: 80px;">Envoi</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
     
     $(document).on('click', '.add', function(){
      var html = '';
      html += '<tr> <td><input class="form-control" name="nom[]" type="text" /></td>'
      html += '<td><textarea class="form-control" name="description[]" style="height: 34px;"></textarea></td>'
      html += '<td> <select class="custom-select" name="serv_prod[]"><optgroup label="This is a group"><option value="service" selected="">Service</option><option value="Produit">Produit</option></optgroup></select></td>'
      html += '<td><select class="custom-select" name="unit[]"><optgroup label="This is a group"><option value="u" selected="">Unit</option><option value="m">Metre</option><option value="kg">KiloGramme</option></optgroup></select></td>'
      html += '<td><input class="form-control" name="qte[]" type="number" /></td>'
      html += '<td><button class="btn btn-primary remove" name="remove" type="button" style="background: rgb(230, 0, 0);"><strong>x</strong></button></td></tr>'
      $('#item_table').append(html);
     });
     
     $(document).on('click', '.remove', function(){
      $(this).closest('tr').remove();
     });
     
    });
</script>

@endsection