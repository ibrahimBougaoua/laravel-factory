@extends('layouts.ui')

@section('content')

  <!--Main layout-->
  <main class="mt-5 pt-4">

    @include('ui.alerts.success')
    @include('ui.alerts.errors')

    <div class="container dark-grey-text mt-5">
    <div class="row my-2">
        <div class="col-lg-12 order-lg-2">
                        <form action="{{ route('ui.customer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">First name</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="first_name" placeholder="First name">
                                @error('first_name')
                                 <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="last_name" placeholder="Last name">                                @error('last_name')
                                 <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Email</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="email" name="email" placeholder="mail@gmail.com">
                                @error('email')
                                 <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Password</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="password" name="password">
                                @error('password')
                                 <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Gender</label>
                            <div class="col-lg-12">
                                <select id="customer_gender" name="gender" class="form-control" size="0">
                                    <option value="man">man</option>
                                    <option value="woman">woman</option>
                                    <option value="other">other</option>
                                </select>
                                @error('gender')
                                 <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Phone</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="phone" placeholder="Phone">
                                @error('phone')
                                 <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">City</label>
                            <div class="col-lg-12">
                                <select id="customer_gender" name="city" class="form-control" size="0">
                                    <option value="man">city 1</option>
                                    <option value="woman">woman</option>
                                    <option value="other">other</option>
                                </select>
                                @error('city')
                                 <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Address</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" value="" name="address" placeholder="Address">
                                @error('address')
                                 <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary float-right mr-0" value="Save Changes">
                            </div>
                        </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
  </main>
  <!--Main layout-->

@endsection('content')