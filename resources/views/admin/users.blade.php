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
                        <th class="email" style="display: none;">Email</th>
                        <th>Role</th>
                        <th>Group</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                            <tr>
                                <form action="{{route('edit_user',$user->id)}}" method="POST">
                                    @csrf
                                    <td><input name="name_input" class="border-0 col-5 bg-white name_input" type="text" value="{{$user->name}}" placeholder="{{$user->name}}" disabled></td>
                                    <td class="email" style="display: none;"><input name="email_input" class="border-0 col-10 bg-white name_input" type="text" value="{{$user->email}}" placeholder="{{$user->email}}"></td>
                                    <td> 
                                    @if(count($user->roles)>0)
                                        @foreach($user->roles as $role)
                                            @foreach ($roleslist as $item)
                                                @if($item->name==$role->name)
                                                    <button type="button" class="badge  badge-success role" value="{{$role->id}}">{{$role->name}}</button>
                                                    <input class="role_input" name="role_input" value='{{$role->id}}' hidden />
                                                @else
                                                    <button type="button" style="display: none" class="badge  badge-danger other_role role" value='{{$item->id}}'>{{$item->name}}</button>
                                                @endif
                                            @endforeach 
                                        @endforeach
                                    @else
                                        <button type="button" class="badge badge-danger">No role</button>
                                    @endif
                                    </td>
                                    <td>
                                        <button type="button" class="badge badge-danger">No group</button>
                                    </td>
                                    <td>
                                        <button id="myBtn_edit" onclick="edit();" type="button" class="badge badge-warning btn_edit">Edit</button>
                                        <button id="myBtn_save" onclick="edit();" type="submit" class="badge badge-warning btn_edit" style="display: none;">Save</button>
                                    </td>
                                </form>    
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
            $(".email").hide();
            $("#myBtn_edit").show();
            $("#myBtn_save").hide();
        }
        else{
            $(".other_role").show();
            $(".email").show();
            $(".name_input").prop('disabled', false);
            $("#myBtn_edit").hide();
            $("#myBtn_save").show();
            //document.getElementById("myBtn").type = "submit";
        }
    }
    
    $(document).on('click', '.role', function(){
        var test = $(this).val();
        $('.role').css("background-color", "red");   
        $(this).css("background-color", "green");     
        $(".role_input").val(test);
    });
</script>
@endsection