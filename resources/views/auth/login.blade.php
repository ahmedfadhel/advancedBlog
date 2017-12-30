@extends('layouts.app')

@section('content')

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Log In</h1>
          <form action="{{route('login')}}" method="POST" role="form">
            {{csrf_field()}}
            <div class="field">
                <label for="email">Email Address</label>
                <p class="control">
                  <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="email" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}">
                </p>
                @if ($errors->has('email'))
                  <p class="help is-danger">{{$errors->first('email')}}</p>
                @endif
              </div>
              <div class="field">
                  <label for="passwoed">Password</label>
                  <p class="control">
                    <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password">
                  </p>
                  @if ($errors->has('password'))
                    <p class="help is-danger">{{$errors->first('password')}}</p>
                  @endif
                 
              </div>
              <div class="field">
                  <b-checkbox name="remember" class="m-t-20">Remember Me</b-checkbox>
              </div>
              <button class="button is-primary is-outlined is-fullwidth m-t-30">Login</button>
          </form>
          
        </div><!-- End Of Card Content-->

      </div>
      <h5 class="has-text-centered m-t-20"><a class="has-text-grey-light" href="{{route('password.request')}}">Forget Your Password?</a></h5>
    </div>
  </div>
@endsection
@section('scripts')
    <script>
      var app = new Vue({
        el:'#app',
        data: {
          
        }
      });
    </script>
@endsection