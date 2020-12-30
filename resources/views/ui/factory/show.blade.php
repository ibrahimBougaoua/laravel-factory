@extends('layouts.ui')

@section('content')

  @include('ui.base.jumbotron',['title' => 'Factory details.'])

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

                          <a href="{{ route('ui.factory.show',$pointOfSales->id) }}" class="btn btn-primary">Show more</a>

                      </div>
                      <!--Card content-->

                  </div>
                  <!--Card-->

              </div>
              <!--Grid column-->
          @endforeach

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center">

          <h4 class="my-4 h4">Additional information</h4>

          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit
            voluptates,
            quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4">

          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

@endsection('content')
