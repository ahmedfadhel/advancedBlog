@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns">
      <div class="column">
        <h1 class="title">Manage Roles</h1>
      </div>
      <div class="column">
        <a href="{{route('roles.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-lock m-r-5"></i>Create New Role</a>
      </div>
    </div>
    <hr class="m-t-0">
    
    <div class="columns is-multiline">
      @foreach ($roles as $role)
        <div class="column is-one-quarter">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h3 class="title"><em>{{$role->display_name}}</em></h3>
                  <h4 class="subtitle">{{$role->name}}</h4>
                  <p>{{$role->description}}</p>
                </div>
                <div class="columns">
                  <div class="column is-one-half">
                    <a href="{{route('roles.show',$role->id)}}" class="button is-primary is-fullwidth">Detials</a>
                  </div>
                  <div class="column is-one-half">
                    <a href="{{route('roles.edit',$role->id)}}" class="button is-fullwidth">Edit</a>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection