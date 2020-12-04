@extends('layouts.ui')

@section('content')

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">


      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Cart</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body">

              <!--Grid row-->
              <div class="row">

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{ $cart->totalQty }}</span>
          </h4>

          @if($cart)
          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">


            @foreach($cart->items as $product)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{ $product['name'] }}</h6>
                <small class="text-muted">{{ $product['description'] }}</small>
              </div>
              <span class="text-muted">${{ $product['unit_price'] }}</span>
            </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>${{ $cart->totalPrice }}</strong>
            </li>
          </ul>
          @else
            <h1>There are No Items in the cart.</h1>
          @endif
          <!-- Cart -->

          <!-- Promo code -->
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
            <a href="{{ route('product.checkout',$cart->totalPrice) }}" class="btn btn-secondary btn-md waves-effect m-0">checkout</a>
          </form>
          <!-- Promo code -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

@endsection('content')