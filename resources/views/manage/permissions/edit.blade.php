@extends('layouts.manage')

@section('content')
<div class="flex-container">
  <div class="columns m-t-10">
    <div class="column">
      <h1 class="title">Create New Permission</h1>
    </div>
  </div>
  <hr class="m-t-0">
  <div class="columns">
    <div class="column">
      <form action="{{route('permissions.update',$permission->id)}}" method="POST" >
        {{csrf_field()}}
        {{method_field('PUT')}}
          <div class="field">
            <label for="display_name">Name:</label>
            <p class="control">
              <input class ="input" type="text" name="display_name" id="display_name" value="{{$permission->display_name}}">
            </p>
            </div>
          <div class="field">
            <label for="name">Slug Name: <small>(Cannot be changed)</small></label>
            <p class="control">
              <input class ="input" type="text" name="name" id="name" value="{{$permission->name}}" disabled>
            </p>
          </div>
          <div class="field">
            <label for="description">Description:</label>
            <p class="control">
              <input class ="input" type="text" name="description" id="description"  value="{{$permission->description}}">
            </p>
        </div>
        <button class="button is-primary m-t-15" type="submit">Update Permission</button>
      </form>
    </div>
  </div>
</div>
@endsection