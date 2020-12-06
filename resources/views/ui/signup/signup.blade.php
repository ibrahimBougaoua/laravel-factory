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
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="last_name" placeholder="Last name">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Email</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="email" name="email" placeholder="mail@gmail.com">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Password</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="password" name="password">
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
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Phone</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="phone" placeholder="Phone">
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
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Address</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" value="" name="address" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Credit card (optional)</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="credit_card"  placeholder="Credit card">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Credit card type (optional)</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="credit_card_type"  placeholder="Credit card type">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Billin address (optional)</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="billin_address"  placeholder="Billin address">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Billin region (optional)</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="billin_region"  placeholder="Billin region">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-lg-12 col-form-label form-control-label">Billin postal code (optional)</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="billin_postal_code" placeholder="Billin postal code">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
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