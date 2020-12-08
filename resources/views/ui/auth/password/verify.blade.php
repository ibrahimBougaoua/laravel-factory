@extends('layouts.ui')

@section('content')

  <!--Main layout-->
  <main class="mt-5 pt-4">

    @include('ui.alerts.success')
    @include('ui.alerts.errors')

    <div class="container dark-grey-text mt-5">

     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Verify Your Email Address</div>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <a href="{{ url('/reset-password/'.$token) }}">Click Here</a>
                </div>
            </div>
        </div>
    </div>

    </div>

  </main>
  <!--Main layout-->

@endsection('content')