@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns">
      <div class="column is-two-thirds">
        <h1 class="title">{{$role->display_name}}<small class="m-l-25"><em>({{$role->name}})</em></small></h1>
        <h5>{{$role->description}}</h5>
      </div>
      <div class="column">
        <a href="{{route('roles.edit',$role->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-balance-scale m-r-5"></i>Create Role</a>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('roles.update',$role->id)}}" method="Post">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <div class="columns">
        <div class="column">
          <div class="box">
            <div class="media">
              <div class="media-content">
                <h2 class="title">Role Details:</h2>
                <div class="field">
                  <p class="control">
                    <label for="display_name">Name (Human Readable)</label>
                    <input class="input" type="text" name="display_name" id="display_name" value="{{$role->display_name}}">
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <label for="name">Slug Name (Unable To change)</label>
                    <input class="input" type="text" name="name" id="name" value="{{$role->name}}" disabled>
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <label for="description">Description (Descripe the Role)</label>
                    <input class="input" type="text" name="description" id="description" value="{{$role->description}}">
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <div class="box">
            <div class="media">
              <div class="media-content">
                <h2 class="title">Permissions</h2>
                <div>
                  @foreach ($permissions as $permission)
                  <div class="field">
                    <b-checkbox v-model="selectedPermission" name='perm_selected[]' native-value="{{$permission->id}}">{{$permission->display_name}} <em>({{$permission->description}})</em></b-checkbox>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <button class="button is-primary">Save Changes</button>
        </div>
      </div>
    </form>

  </div>
@endsection

@section('script')
  <script>
    let app = new Vue({
      el:"#app",
      data:{
        selectedPermission: {!!$role->permissions->pluck('id')!!}
      }
    })
  </script>
@endsection