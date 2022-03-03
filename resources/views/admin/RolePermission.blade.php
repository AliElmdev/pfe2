@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_admin')

@endsection

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <a href="" class="btn btn-success">Add Role</a>
            <a href="" class="btn btn-primary">Add User Role</a>
            <div class="card">
                <div class="card-header">Roles</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Roles</th>
                                <th>Permissions</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>
                                    @if(count($role->permissions)>0)
                                        @foreach($role->permissions as $permission)
                                             <span class="badge badge-success">{{$permission->name}}</span>
                                        @endforeach
                                    @else
                                        <span class="badge badge-danger">No permission</span>
                                    @endif
                                </td>
                                <td>
                                    <ul>
                                    @if(count($role->users)>0)
                                        @foreach($role->users as $user)
                                             <li class="badge badge-success">{{$user->name}}</li>
                                        @endforeach
                                    @else
                                        <li class="badge badge-danger">No user</li>
                                    @endif
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
