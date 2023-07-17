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

        <form class='submitForm'>
          <div class='form-group'>
            <label for='email'>Email:</label>
            <input 
              type='text'
              name='email'
              class='form-control is-invalid'
              placeholder='Email Address'
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
      </div>
    </div>
  </div>

@stop