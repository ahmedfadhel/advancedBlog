@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create User</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <div class="columns">
      <div class="column">
        <form action="{{route('users.store')}}" method="POST">
          {{csrf_field()}}
          <div class="field">
            <label for="name">Name:</label>
            <p class="control">
              <input class ="input" type="text" name="name" id="name">
            </p>
          </div>
          <div class="field">
            <label for="email">Email:</label>
            <p class="control">
              <input class ="input" type="email" name="email" id="email">
            </p>
          </div>
          <div class="field">
            <label for="password">Password:</label>
            <p class="control">
              <input class ="input" type="password" name="password" id="password" v-if="!auto_password">
              <b-checkbox class="m-t-15" name="auto_generate" v-model="auto_password">Auto Generate Password</b-checkbox>
            </p>
          </div>
          <button class="button is-primary" type="submit">Create User</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    var app1 = new Vue({
      el: '#app',
      data: {
        auto_password : false
      },
    });
  </script>
@endsection