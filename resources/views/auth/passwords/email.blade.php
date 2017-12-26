@extends('layouts.app')

@section('content')
	@if (session('status'))
	<div class="notification is-success">
		{{ session('status') }}
	</div>
	@endif
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
					<h1 class="title">Forget Password?</h1>
					
          <form action="{{route('password.email')}}" method="POST" role="form">
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
						<button class="button is-primary is-outlined is-fullwidth m-t-30">Get Password Link</button>
          </form>
          
        </div><!-- End Of Card Content-->

      </div>
      <h5 class="has-text-centered m-t-20"><a class="has-text-grey-light" href="{{route('login')}}"><i class="fa fa-caret-left m-r-10"></i>Back To Login</a></h5>
    </div>
  </div>
@endsection
