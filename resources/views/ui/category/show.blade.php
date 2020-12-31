@extends('layouts.ui')

@section('content')

    @include('ui.base.jumbotron',['title' => 'Category details.'])

    <!--Main layout-->
    <main class="m-5">
        <div class="container dark-grey-text">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <div class="col-md-6 mb-4">

                    <!--Content-->
                    <div class="p-4">
                        <p class="lead font-weight-bold">Name</p>
                        <p class="lead">
              <span class="mr-1">
                {{ $category->name }}
              </span>
                        </p>

                        <p class="lead font-weight-bold">Description</p>

                        <p>{{ $category->description }}</p>

                    </div>
                    <!--Content-->

                </div>
                <!--Grid column-->

                <div class="row wow fadeIn">

                    <div class="col-md-12 p-5 text-muted text-center">
                        <h4 class="h4">Products</h4>
                    </div>

                @foreach($category->products as $product)
                    <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4">

                            <!--Card-->
                            <div class="card">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg" class="card-img-top"
                                         alt="">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Category & Title-->
                                    <a href="" class="grey-text">
                                        <h5>{{$product->name}}</h5>
                                    </a>
                                    <h5>
                                        <strong>
                                            <a href="" class="dark-grey-text">{{$product->name}}
                                                <span class="badge badge-pill danger-color">NEW</span>
                                            </a>
                                        </strong>
                                    </h5>

                                    <h4 class="font-weight-bold blue-text">
                                        <strong>{{$product->unit_price}}$</strong>
                                    </h4>

                                    <a href="{{ route('ui.product.show',$product->id) }}" class="dark-grey-text">Show more</a>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <!--Grid column-->
                    @endforeach

                </div>
                <!--Grid row-->


            </div>
    </main>
    <!--Main layout-->

@endsection('content')
