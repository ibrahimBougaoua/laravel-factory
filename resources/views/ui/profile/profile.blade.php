@extends('layouts.ui')

@section('content')

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">
    <div class="row my-2">

      @include('panel.alerts.success')
      @include('panel.alerts.errors')
      
        <div class="col-lg-8 order-lg-2">
                        <form action="{{ route('ui.customer.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $customer->id }}" />
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="first_name" value="{{ $customer->first_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="last_name" value="{{ $customer->last_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="email" value="{{ $customer->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                            <div class="col-lg-9">
                                <select id="customer_gender" name="gender" class="form-control" size="0">
                                    @foreach(genders() as $gender)
                                      @if($gender == $customer->gender)
                                      <option value="{{ $gender }}" selected="selected">{{ $gender }}</option>
                                      @else
                                      <option value="{{ $gender }}">{{ $gender }}</option>
                                      @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="phone" value="{{ $customer->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">City</label>
                            <div class="col-lg-9">
                                <select id="customer_gender" name="city" class="form-control" size="0">
                                    @foreach(list_of_city() as $city)
                                       @if($city == $customer->city)
                                       <option value="{{ $city }}" selected="selected">{{ $city }}</option>
                                       @else
                                       <option value="{{ $city }}">{{ $city }}</option>
                                       @endif
                                     @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{ $customer->address }}" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Credit card</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="credit_card" value="{{ $customer->credit_card }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Credit card type</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="credit_card_type" value="{{ $customer->credit_card_type }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Billin address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="billin_address" value="{{ $customer->billin_address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Billin region</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="billin_region" value="{{ $customer->billin_region }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Billin postal code</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="billin_postal_code" value="{{ $customer->billin_postal_code }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="submit" class="btn btn-primary float-right mr-0" value="Save Changes">
                            </div>
                        </div>
                    </form>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6 class="mt-2">Upload a different photo</h6>
            <label class="custom-file">
                <input type="file" id="file" class="custom-file-input">
                <span class="custom-file-control">Choose file</span>
            </label>
        </div>
    </div>
</div>
  </main>
  <!--Main layout-->

@endsection('content')