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
                                <td><input name="name_input" class="border-0 col-5 bg-white name_input" type="text" placeholder="{{$user->name}}" disabled></td>
                                <td>
                                    
                                @if(count($user->roles)>0)
                                    @foreach($user->roles as $role)
                                        @foreach ($roleslist as $item)
                                            @if($item->name==$role->name)
                                                <button class="badge  badge-success role">{{$role->name}}</button>
                                                <input class="role_input" name="role_input" value='{{$role->name}}' hidden />
                                            @else
                                                <button style="display: none" class="badge  badge-danger other_role role" value='{{$item->name}}'>{{$item->name}}</button>
                                            @endif
                                        @endforeach 
                                    @endforeach
                                @else
                                    <button class="badge badge-danger">No role</button>
                                @endif
                                </td>
                                <td>
                                    <button class="badge badge-danger">No group</button>
                                </td>
                                <td><button id="myBtn" onclick="edit()" type="button" class="badge badge-warning btn_edit">Edit</button></td>
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
<script>
    function edit(){
        if($(".other_role").is(":visible")){
            $(".other_role").hide();
            $(".btn_edit").html('Edit');
        }
        else{
            $(".other_role").show();
            $(".name_input").prop('disabled', false);
            document.getElementById("myBtn").type = "submit";
            $(".btn_edit").html('Save');
        }
    }
    $(document).on('click', '.role', function(){
        var test = $(this).val();
        $('.role').css("background-color", "red");   
        $(this).css("background-color", "green");     
        $("input.role_input").val(test);
    });
</script>
@endsection