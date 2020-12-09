@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Create product</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">New product</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                        @error('name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Quantity unit</label>
                                        <input type="text" name="quantity_unit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Quantity unit">
                                        @error('quantity_unit')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Unit price</label>
                                        <input type="text" name="unit_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Unit price">
                                        @error('unit_price')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Size</label>
                                        <input type="text" name="size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Size">
                                        @error('size')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Color</label>
                                        <input type="text" name="color" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Color">
                                        @error('color')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Categories Parent/Child</label>
                                        <select class="form-control" name="cateid" id="exampleFormControlSelect1">
                                        <option value="0">Parent</option>
                                          @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                              @if($category->subcateid == 0)
                                                Parent - {{ $category->name }}
                                              @else
                                                Child - {{ $category->name }}
                                              @endif
                                            </option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Note</label>
                                        <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Note"></textarea>
                                        @error('note')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Descrition</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        @error('description')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Create new Product</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')