@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit User</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <div class="columns">
      <div class="column">
        <form action="{{route('users.update',$user->id)}}" method="POST">
          {{method_field('PUT')}}
          {{csrf_field()}}
          <div class="field">
            <label for="name">Name:</label>
            <p class="control">
              <input class ="input" type="text" name="name" id="name" value="{{$user->name}}">
            </p>
          </div>
          <div class="field">
            <label for="email">Email:</label>
            <p class="control">
              <input class ="input" type="email" name="email" id="email" value="{{$user->email}}">
            </p>
          </div>
          <div class="field">
            <label for="password">Password:</label>
            <div class="field">
              <b-radio v-model="password_option" native-value="keep" name="password_option">
                Don't Change the old passowrd
              </b-radio>
            </div>
            <div class="field">
              <b-radio v-model="password_option" native-value="auto" name="password_option">
                Auto-generate New Password
              </b-radio>
            </div>
            <div class="field">
              <b-radio v-model="password_option" native-value="manual" name="password_option">
                manually Create New Password
              </b-radio>
              <input class ="input m-t-15" type="password" name="password" id="password" v-if="password_option == 'manual'">
            </div>
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
        password_option : 'keep'
      },
    });
  </script>
@endsection