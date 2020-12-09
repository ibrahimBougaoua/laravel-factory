@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('store.index') }}">stores</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Edit</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- Store -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update Store</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('store.update',$store->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">

                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Quantity store</label>
                                        <input type="text" name="quantity_store" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $store->quantity_store }}">
                                        @error('quantity_store')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Quantity sold</label>
                                        <input type="text" name="quantity_sold" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $store->quantity_sold }}">
                                        @error('quantity_sold')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select a point of sale</label>
                                        <select class="form-control" name="point_sale_id" id="exampleFormControlSelect1">
                                        @foreach($pointsOfSales as $pointOfSale)
                                          @if($pointOfSale->id == $store->point_sale_id)
                                            <option value="{{ $pointOfSale->id }}" selected="selected">{{ $pointOfSale->name }}</option>
                                          @else
                                            <option value="{{ $pointOfSale->id }}">{{ $pointOfSale->name }}</option>
                                          @endif
                                        @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select an products</label>
                                        <select class="form-control" name="product_id" id="exampleFormControlSelect1">
                                        @foreach($products as $product)
                                          @if($product->id == $store->product_id)
                                            <option value="{{ $product->id }}" selected="selected">{{ $product->name }}</option>
                                          @else
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                          @endif
                                        @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Update Store</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')