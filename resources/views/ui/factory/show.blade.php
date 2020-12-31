@extends('layouts.ui')

@section('content')

  @include('ui.base.jumbotron',['title' => 'Factory details.'])

  {{ $factory->getCategoriesByFactoryId(2) }}

  <!--Main layout-->
  <main class="m-5">
    <div class="container dark-grey-text">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src="{{ $factory->logo }}" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href="">
                <span class="badge purple mr-1">Category 2</span>
              </a>
              <a href="">
                <span class="badge blue mr-1">New</span>
              </a>
              <a href="">
                <span class="badge red mr-1">Bestseller</span>
              </a>
            </div>

            <p class="lead">
              <span class="mr-1">
                <del>${{ $factory->name }}</del>
              </span>
              <span>$100</span>
            </p>

            <p class="lead font-weight-bold">Description</p>

            <p>{{ $factory->name }}</p>

            <div class="d-flex justify-content-left">
              <!-- Default input -->
              <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">
              <a class="btn btn-primary btn-md my-0 p" href="{{route('product.addToCart',$factory->id)}}">Add to cart
                <i class="fas fa-shopping-cart ml-1"></i>
              </a>

            </div>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      @foreach($factory->getPointOfSales as $pointOfSales)
          <!--Grid column-->
              <div class="col-lg-4 col-md-8 mb-4">

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
                              <h5>{{$pointOfSales->name}}</h5>
                          </a>

                          <p class="font-weight-bold text-muted">{{$pointOfSales->address}}</p>

                      </div>
                      <!--Card content-->

                  </div>
                  <!--Card-->

              </div>
              <!--Grid column-->
          @endforeach

      </div>
      <!--Grid row-->

        <div class="row wow fadeIn">
            <div class="col-md-12 p-5 text-muted text-center">
                <h4 class="h4">Categories</h4>
            </div>
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="flex-column">
                        @foreach($factory->getCategoriesByFactoryId($factory->id) as $cate)
                           <a href="{{ $cate->id  }}" class="btn btn-outline-dark">{{ $cate->name }}</a>
                        @endforeach
                </div>
            </div>
        </div>
        <!--Grid row-->

        <div class="row wow fadeIn">

            <div class="col-md-12 p-5 text-muted text-center">
                <h4 class="h4">Products</h4>
            </div>

        @foreach($factory->getProductByFactoryId($factory->id) as $product)
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
