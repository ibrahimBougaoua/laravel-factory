@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create new Store</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mb-4">
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
                                      </div>
                                      <button type="submit" class="btn btn-primary">Create new Store</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')