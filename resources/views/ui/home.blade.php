@extends('layouts.ui')

@section('content')

  <div class="jumbotron" style="background-color: #3F51B5;height: 50vw;">
    <div class="row">
      <div class="col-md-6">
        <div class="ml-5" style="position: relative;top: 8vw;left: 39px;">
          <p class="display-4 lead text-white line-h" style="font-size: 35px;">Create your own platform to showcase the products of your factory</p>
          <a class="btn btn-lg btn-outline-light ml-5" href="#contact" style="background-color: #007bff;">Login</a>
          <a class="btn btn-lg text-light" href="#contact" style="background-color: #007bff;">Getting started </a>
        </div>  
      </div>
      <div class="col-md-6 pr-5">
        <img src="{{asset('ui/images/factory_worker.png')}}" class="img-fluid mt-5" alt="Responsive image">
      </div>
    </div>
  </div>

  <!--Main layout-->
  <main>
    <div class="container">

      @include('panel.alerts.success')
      @include('panel.alerts.errors')

      <!--Section: Products v.3-->
      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <div class="col-md-12 p-5 text-muted text-center">
            <h4 class="h4">Trending products</h4>
          </div>

          @foreach($products as $product)
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

      </section>
      <!--Section: Products v.3-->

      <!--Pagination-->
      <div class="d-flex">
          <div class="mx-auto">
              {{$products->links("pagination::bootstrap-4")}}
          </div>
      </div>
      <!--Pagination-->

    </div>
  </main>
  <!--Main layout-->


@endsection('content')