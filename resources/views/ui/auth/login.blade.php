@extends('layouts.ui')

@section('content')

  @include('ui.base.jumbotron',['title' => 'Log in to you\'r account.'])

  <!--Main layout-->
  <main class="m-5">

    @include('ui.alerts.success')
    @include('ui.alerts.errors')

    <div class="container dark-grey-text">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card o-hidden border-0 shadow">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12 p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back !</h1>
                                    </div>
                               <form class="form-horizontal form-simple" action="{{route('ui.login')}}" method="post">
                                @csrf
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                    <input type="text" name="email" class="form-control form-control-lg input-lg mb-3"
                                           value="{{old('email')}}" id="email" placeholder="Enter you'r email">
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="password" name="password" class="form-control form-control-lg input-lg"
                                           id="user-password"
                                           placeholder="أدخل كلمة المرور">
                                    <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-md-6 col-12 text-center text-md-left">
                                        <fieldset>
                                            <input type="checkbox" name="remember_me" id="remember-me"
                                                   class="chk-remember">
                                            <label for="remember-me">Remeber me</label>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info btn-lg float-right"><i class="ft-unlock"></i>
                                            Log in
                                        </button>
                                    </div>
                                </div>
                            </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('ui.customer.getEmail') }}">Forgot Password ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('ui.signup') }}">Create an Account !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

  </main>
  <!--Main layout-->

@endsection('content')
