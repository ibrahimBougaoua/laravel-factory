@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">
                    
                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('store.index') }}">stores</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Create new</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">New Store</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('store.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">

                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Quantity store</label>
                                        <input type="text" name="quantity_store" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity store">
                                        @error('quantity_store')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Quantity sold</label>
                                        <input type="text" name="quantity_sold" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity sold">
                                        @error('quantity_sold')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select a point of sale</label>
                                        <select class="form-control" name="point_sale_id" id="exampleFormControlSelect1">
                                        @foreach($pointsOfSales as $pointOfSale)
                                          <option value="{{ $pointOfSale->id }}">{{ $pointOfSale->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select an products</label>
                                        <select class="form-control" name="product_id" id="exampleFormControlSelect1">
                                        @foreach($products as $product)
                                          <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Create new Store</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')