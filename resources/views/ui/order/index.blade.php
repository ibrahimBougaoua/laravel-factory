@extends('layouts.ui')

@section('content')

  @include('ui.base.jumbotron',['title' => 'All you\'r orders'])

  <!--Main layout-->
  <main class="m-5">
    <div class="container dark-grey-text">
    <div class="row my-2">

        <div class="col-md-12 p-5 text-muted text-center">
            <h4 class="h4">All you'r orders</h4>
        </div>
        <div class="col-md-12">
            @foreach($carts as $cart)
            <div class="card mb-3">
                <div class="card-body">

                    <table class="table table-striped mt-2 mb-2">
                        <thead>
                            <tr>

                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->items as $item)
                            <tr>

                                <td>{{$item['name'] }}</td>
                                <td>${{$item['unit_price'] }}</td>
                                <td>{{$item['qty'] }}</td>
                                <td> Paid</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <p class="badge badge-pill btn-primary mb-3 p-3 text-white">Total Price : ${{$cart->totalPrice}}</p>
            @endforeach
        </div>
    </div>
</div>
  </main>
  <!--Main layout-->

@endsection('content')
