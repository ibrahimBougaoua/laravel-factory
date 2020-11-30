@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update product</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mb-4">
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
                                        <label for="exampleInputEmail1">Descrition</label>
                                        <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->description }}">
                                        @error('desc')
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
                                        <label for="exampleInputEmail1">Note</label>
                                        <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->note }}</textarea>
                                        @error('note')
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
                                      <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')