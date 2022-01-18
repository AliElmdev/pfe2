@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_admin')

@endsection

@section('title')
@endsection

@section('content')
<div class="col-md">
    <div class="card">
        <div class="card-header">Users</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Group</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                         
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                
                            @if(count($user->roles)>0)
                                @foreach($user->roles as $role)
                                    @foreach ($roleslist as $item)
                                        @if($item->name==$role->name)
                                        <span class="badge  badge-success">{{$role->name}}</span>
                                        @else
                                            <span style="display: true" class="badge  badge-danger">{{$item->name}}</span>
                                        @endif
                                    @endforeach 
                                @endforeach
                            @else
                                <span class="badge badge-danger">No role</span>
                            @endif
                            
                            </td>
                            <td>
                                <span class="badge badge-danger">No group</span>
                            </td>
                            <td><a href="" class="badge badge-warning">Edit</a></td>
                            <td>
                                <form action="/all_users/delete/{{ $user->id }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button class="badge badge-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
