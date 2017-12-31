@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns">
      <div class="column is-two-thirds">
        <h1 class="title">Create New Role</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('roles.store')}}" method="Post">
      {{csrf_field()}}
      <div class="columns">
        <div class="column">
          <div class="box">
            <div class="media">
              <div class="media-content">
                <div class="field">
                  <p class="control">
                    <label for="display_name">Name <em>(Human Readable)</em></label>
                    <input class="input" type="text" name="display_name" id="display_name">
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <label for="name">Slug Name</label>
                    <input class="input" type="text" name="name" id="name">
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <label for="description">Description (Descripe the Role)</label>
                    <input class="input" type="text" name="description" id="description">
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
          <button class="button is-primary">Create New Role</button>
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
        selectedPermission: []
      }
    })
  </script>
@endsection