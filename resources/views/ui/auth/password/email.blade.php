@extends('layouts.ui')

@section('content')

    @include('ui.base.jumbotron',['title' => 'Reset you\'r password.'])

    <!--Main layout-->
  <main class="mt-5">

    <div class="container dark-grey-text mt-5">

        <div class="row justify-content-center">

        @include('ui.alerts.success')
        @include('ui.alerts.errors')

            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg mb-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Recive password !</h1>
                                    </div>

                               <form class="form-horizontal form-simple" action="{{route('ui.customer.postEmail')}}" method="post">
                                @csrf
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                    <input type="text" name="email" class="form-control form-control-lg input-lg mb-3" id="email" placeholder="Enter you'r email">
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </fieldset>
                                <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>
                                    Send email
                                </button>
                            </form>


                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('ui.get.login') }}">login</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/">Home page</a>
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
