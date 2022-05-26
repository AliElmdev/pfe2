@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_admin')

@endsection

@section('title')
@endsection

@section('content')
<div class="col-md">
    <div class="card">
        <div class="ml-4">Filter :</div>
        <div class="card-header">
            <select onchange="filter_users();" class="form-select users_list" aria-label="Default select example">
                <option value="all">All</option>
                @foreach ($roleslist as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach 
            </select>
        </div>
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
                                    <td><input name="name_input" class="border-0 col-5 bg-white name_input name_input-{{$user->id}}" type="text" value="{{$user->name}}" placeholder="{{$user->name}}" disabled></td>
                                    <td class="email email-{{$user->id}}" style="display: none;"><input name="email_input" class="border-0 col-10 bg-white name_input name_input-{{$user->id}}" type="text" value="{{$user->email}}" placeholder="{{$user->email}}"></td>
                                    <td> 
                                    @if(count($user->roles)>0)
                                        @foreach($user->roles as $role)
                                            @foreach ($roleslist as $item)
                                                @if($item->name==$role->name)
                                                    <button type="button" class="badge  badge-success role {{$role->name}}" value="{{$role->id}}">{{$role->name}}</button>
                                                    <input class="role_input" name="role_input" value='{{$role->id}}' hidden />
                                                @else
                                                    <button type="button" style="display: none" class="badge  badge-danger other_role other_role-{{$user->id}} role" value='{{$item->id}}'>{{$item->name}}</button>
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
                                        <button id="myBtn_edit-{{$user->id}}" onclick="edit(this.id);" type="button" class="badge badge-warning btn_edit">Edit</button>
                                        <button id="myBtn_save-{{$user->id}}" onclick="edit(this.id);" type="submit" class="badge badge-warning btn_edit" style="display: none;">Save</button>
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
    
    function filter_users(){
        var role_selected = $(".users_list").val();
        if(role_selected == 'all'){
            $('.role').closest('tr').show();
        }else{
            role_selected = '.'+role_selected;
            $('.role').closest('tr').hide();
            $(role_selected).closest('tr').show();
        }   
    }

    function edit(clicked_id){
        const myArray = clicked_id.split("-");
        id_item = myArray[1];
        other_role = ".other_role-" + id_item;
        email = ".email-" + id_item;
        myBtn_edit = "#myBtn_edit-"+ id_item;
        myBtn_save = "#myBtn_save-" + id_item;
        name_input = ".name_input-"+id_item;
        if($(other_role).is(":visible")){
            $(other_role).hide();
            $(email).hide();
            $(myBtn_edit).show();
            $(myBtn_save).hide();
        }
        else{
            $("button[class^='other_role-']").hide();
            $("button[id^='myBtn_save-']").hide();
            $("button[id^='myBtn_edit-']").show();
            $("button[class^='name_input-']").prop('disabled', true);
            $("input[class^='email-']").hide();
            $(other_role).show();
            $(email).show();
            $(name_input).prop('disabled', false);
            $(myBtn_edit).hide();
            $(myBtn_save).show();
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