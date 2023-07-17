@extends('layouts/main')

@section('content')
  <style>
    .login-container {
      color: #fff;
    }
    .submitBtn {
      width: 90px;
    }
    .submitBtnContainer {
      margin-top: 20px;
      text-align:right;
    }
    .submitForm {
      text-align:left;
    }
  </style>
  <div class='container login-container'>
    <div class='row'>
      <div class='col-md-6'>
        <h3 class='login-header'>Login</h3>

        <form class='submitForm loginForm' method="POST" action="{{ route('loginAction') }}">
          @csrf
          <div class='form-group'>
            <label for='email'>Email:</label>
            <input 
              type='text'
              name='email'
              class="form-control @if(null !== session('login.errors') && isset(session('login.errors')['email'])) is-invalid @endif"
              placeholder='Email Address'
              value="{{ old('email') }}"
            />
            @if(null !== session('login.errors') && isset(session('login.errors')['email']))
            <div class="invalid-feedback">
              {{ session('login.errors')['email'] }}
            </div>
            @endif
          </div>

          <div class='form-group'>
            <label for='password'>Password:</label>
            <input 
              type='password'
              name='password'
              class="form-control @if(null !== session('login.errors') && isset(session('login.errors')['password'])) is-invalid @endif"
              placeholder='Password'
            />
            @if(null !== session('login.errors') && isset(session('login.errors')['password']))
            <div class="invalid-feedback">
              {{ session('login.errors')['password'] }}
            </div>
            @endif
          </div>

          <div class='form-group'>
            <label for='rememberToken'>Remember me</label>
            <input 
              type='checkbox' 
              name='rememberToken'
              value="{{ old('rememberToken') }}"
            />
          </div>

          <div class='form-group submitBtnContainer'>
            <input 
              type='submit'
              class='submitBtn form-control btn btn-primary btn-sm'
            />
          </div>
        </form>
      </div>
      <div class='col-md-6'>
        <h3 class='signup-header'>Signup</h3>

        <form class='submitForm signUpForm' method="POST" action="{{ route('registerAction') }}">
          @csrf
          <div class='form-group'>
            <label for='email'>Email:</label>
            <input 
              type='text'
              name='email'
              class="form-control @if(null !== session('register.errors') && isset(session('register.errors')['email'])) is-invalid @endif"
              placeholder='Email Address'
              value="{{ old('email') }}"
            />
            @if(null !== session('register.errors') && isset(session('register.errors')['email']))
            <div class="invalid-feedback">
              {{ session('register.errors')['email'] }}
            </div>
            @endif
          </div>

          <div class='form-group'>
            <label for='password'>Password:</label>
            <input 
              type='password'
              name='password'
              class="form-control @if(null !== session('register.errors') && isset(session('register.errors')['password'])) is-invalid @endif"
              placeholder='Password'
              value="{{ old('password') }}"
            />
            @if(null !== session('register.errors') && isset(session('register.errors')['password']))
            <div class="invalid-feedback">
              {{ session('register.errors')['password'] }}
            </div>
            @endif
          </div>

          <div class='form-group'>
            <label for='password_confirmation'>Password Confirmation:</label>
            <input 
              type='password'
              name='password_confirmation'
              class="form-control @if(null !== session('register.errors') && isset(session('register.errors')['password_confirmation'])) is-invalid @endif"
              placeholder='Password Confirmation'
            />
            @if(null !== session('register.errors') && isset(session('register.errors')['password_confirmation']))
            <div class="invalid-feedback">
              {{ session('register.errors')['password_confirmation'] }}
            </div>
            @endif
          </div>

          <div class='form-group submitBtnContainer'>
            <input 
              type='submit'
              class='submitBtn form-control btn btn-primary btn-sm'
            />
          </div>
        </form>
      </div>
    </div>
  </div>

@stop

@section('scripts')
    <script src="{{ asset('/js/auth.js') }}"></script>
@endsection