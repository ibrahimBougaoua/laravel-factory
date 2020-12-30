@extends('layouts.ui')

@section('content')

  <div class="jumbotron" style="background-color: #3F51B5;">
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-7">
              <h1 class="display-4 text-white font-weight-bold">Create your own platform to showcase the products of your factory.</h1>
              <p class="display-5 lead text-warning"># <span class="text-warning font-weight-bold typing"></span></p>
              <h3 class="text-white">We offer you a factory land platform so that you can add your factory's products, points of sale, workers, and a lot of features that enable you to display your products, so what are you waiting for ?</h3>
              <div class="mt-4">
                  <a class="btn btn-lg btn-outline-light ml-0" href="#contact"><i class="fas fa-lock-open"></i> Sign in</a>
                  <a class="btn btn-lg text-light bg-primary" href="#contact"><i class="fas fa-hourglass-start"></i> Getting started </a>
              </div>
          </div>
          <div class="col-md-5 m-0 p-0">
            <img src="{{asset('ui/images/factory_worker.png')}}" class="img-fluid mt-5" alt="Responsive image">
          </div>
        </div>
      </div>
  </div>

  <!--Main layout-->
  <main>
    <div class="container">

      @include('panel.alerts.success')
      @include('panel.alerts.errors')

      <section class="text-center mb-4">
          <div class="row wow fadeIn">

              <div class="col-md-12 p-5 text-muted text-center">
                  <h4 class="h4">Factories</h4>
              </div>

          @foreach($factories as $factory)
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
                                  <h5>{{$factory->name}}</h5>
                              </a>

                              <p class="font-weight-bold text-muted">{{$factory->desc}}</p>

                              <a href="{{ route('ui.product.show',$factory->id) }}" class="btn btn-primary">Show more</a>

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
