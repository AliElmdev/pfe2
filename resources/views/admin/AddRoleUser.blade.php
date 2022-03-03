@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_admin')

@endsection

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
<div class="container">
<form action="" method="post">
    <div class="row justify-content-center">
        <div class="col-md-6">
         @csrf
            <div class="card">
                <div class="card-header">Roles</div>
                <div class="card-body">
                  <select name="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                   </select>
                </div>
                <div class="card-footer"><input type="submit" class="btn btn-success" name="add_role" value="Add Roles"/></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                   <ul>
                    @foreach($users as $user)
                        <li><input type="checkbox" name="users[]" value="{{$user->id}}">{{$user->name}}</li>
                    @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
