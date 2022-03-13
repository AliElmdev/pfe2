@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_admin')

@endsection

@section('title')
@endsection

@section('content')
<div class="col-md">
    <div class="card">
        <h3 class="ml-4 text-center font-weight-bold">Créer Un Nouvel Utilisateur</h3>
        <form action="{{route('create_user_store')}}" method="post">
            @csrf
            <div class="card-header">
                <div class="ml-1">Type De L'utilisateur : </div>
                <select onchange="selectroleuser();" name="user_role" class="form-select roles_list text-capitalize" aria-label="Default select example" required>
                    @foreach ($roles as $role)
                        @if ($role->name != 'User' && $role->name != 'Unverified')
                            <option value="{{$role->name}}" class="text-capitalize">{{$role->name}}</option>
                        @endif
                    @endforeach 
                </select>
                <div class="ml-1">Nom : </div>
                <div><input type="text" name="name" id="" class="form-control" required></div>
                <div class="ml-1">Email : </div>
                <div><input type="email" name="email" id="" class="form-control" required></div>
                <div class="departements" style="display: none">
                    <div class="ml-1">Departement : </div>
                    <select name="departement" class="form-select departements_list text-capitalize" aria-label="Default select example">
                        @foreach ($departements as $departement)
                            <option value="{{$departement->id}}" class="text-capitalize">{{$departement->nom}}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="ml-1 mt-5 text-center"><button type="submit" class="btn btn-success border-dark">Ajouter</button></div>
                <div class="ml-1 mt-5 alert-primary font-weight-bold text-center">Le mot de passe sera envoyé par e-mail</div>
            </div>
        </form>
    </div>
</div>

<script>

    // function selectroleuser(){
    //     alert('f');
    //     if($('.roles_list').val() == 'Achat'){
    //         $('.departements').style.display = 'block';
    //     }else{
    //         $('.departements').style.display = 'none';
    //     }
    // }

    function selectroleuser() {
        if($('.roles_list').val() == 'chef'){
            $('.departements').css({display: "block"});
        }else{
            $('.departements').css({display: "none"});
        }
    }

</script>

@endsection