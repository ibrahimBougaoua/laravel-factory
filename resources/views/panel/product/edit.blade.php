@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('product.index') }}">products</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Edit</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update product</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->name }}">
                                        @error('name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Quantity unit</label>
                                        <input type="text" name="quantity_unit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->quantity_unit }}">
                                        @error('quantity_unit')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Unit price</label>
                                        <input type="text" name="unit_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->unit_price }}">
                                        @error('unit_price')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Size</label>
                                        <input type="text" name="size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->size }}">
                                        @error('size')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Color</label>
                                        <input type="text" name="color" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->color }}">
                                        @error('color')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Parent/Child</label>
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
                                        <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->note }}</textarea>
                                        @error('note')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Descrition</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->description }}</textarea>
                                        @error('desc')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Update</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')