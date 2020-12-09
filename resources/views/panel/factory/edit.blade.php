@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">
                    
                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('factory.index') }}">Factoreis</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Edit</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- factories -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update factory</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('factory.update',$factory->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $factory->id }}" />
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $factory->name }}">
                                        @error('name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $factory->phone }}">
                                        @error('phone')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>   
                                      <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="5">{{ $factory->desc }}</textarea>
                                        @error('desc')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>        
                                      <div class="form-group col-md-5 pt-2">
                                        <img src="{{ $factory->logo }}" class="img-fluid w-100 h-100 rounded" alt="...">
                                      </div>
                                      <div class="form-group col-md-7 pt-2">
                                        <label for="exampleFormControlTextarea1">Logo</label>
                                        <div class="custom-file mt-2">
                                          <input type="file" name="logo" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Choose logo</label>
                                        </div>
                                        <p class="text-munted mt-2">This is the image that will appear in your factory account, try to put a picture that expresses the type of your products, so that your factory appears more beautiful and clear.</p>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Update factory</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')