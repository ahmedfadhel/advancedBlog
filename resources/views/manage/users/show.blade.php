@extends('layouts.manage')
@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">View User Details</h1>
      </div>
      <div class="column">
        <a href="{{route('users.edit',$user->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-5"></i>Edit User</a>
      </div>
    </div>
    <hr class="m-t-0">
    <div class="columns">
      <div class="column"> 
        <div class="field">
          <label for="name">Name:</label>
          <p>{{$user->name}}</p>
        </div>
        <div class="field">
          <label for="email">Email:</label>
          <p>{{$user->email}}</p>
        </div>
        <div class="field">
          <label for="roles">Roles:</label>
          <ul>
            @foreach ($user->roles as $role)
              <li>{{$role->display_name}} <em>({{$role->description}})</em></li>
            @endforeach
          </ul>
          
        </div>
      </div>
    </div>
  </div>
@endsection