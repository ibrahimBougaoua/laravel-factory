@extends('layouts.ui')

@section('content')

    @include('ui.base.jumbotron',['title' => 'Reset you\'r password.'])
  <!--Main layout-->
  <main class="mt-5 pt-4">

    @include('ui.alerts.success')
    @include('ui.alerts.errors')

    <div class="container dark-grey-text mt-5">

     <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
                 <div class="card-header">Reset Password</div>
                      <div class="card-body">
                          <form method="POST" action="/reset-password">
                           @csrf
                           <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                          <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                      <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                     <div class="form-group row mb-0">
                           <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

  </main>
  <!--Main layout-->

@endsection('content')
