@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">
                    
                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('factory.index') }}">Factoreis</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Create new</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- factory -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">New factory</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('factory.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone number">
                                        @error('phone')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Descrition</label>
                                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        @error('desc')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlTextarea1">Logo</label>
                                        <div class="custom-file">
                                          <input type="file" name="logo" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Create new factory</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')