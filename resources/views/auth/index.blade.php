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
              class='form-control is-invalid'
              placeholder='Email Address'
              value="{{ old('email') }}"
            />
            <div class="invalid-feedback">
              Invalid username and password combination.
            </div>
          </div>

          <div class='form-group'>
            <label for='password'>Password:</label>
            <input 
              type='password'
              name='password'
              class='form-control'
              placeholder='Password'
            />
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
              class='form-control is-invalid'
              placeholder='Email Address'
              value="{{ old('email') }}"
            />
            <div class="invalid-feedback">
              Invalid username and password combination.
            </div>
          </div>

          <div class='form-group'>
            <label for='password'>Password:</label>
            <input 
              type='password'
              name='password'
              class='form-control'
              placeholder='Password'
              value="{{ old('password') }}"
            />
          </div>

          <div class='form-group'>
            <label for='password_confirmation'>Password Confirmation:</label>
            <input 
              type='password'
              name='password_confirmation'
              class='form-control'
              placeholder='Password Confirmation'
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
    </div>
  </div>

@stop

@section('scripts')
    <script src="{{ asset('/js/auth.js') }}"></script>
@endsection