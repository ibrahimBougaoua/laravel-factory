@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update factory</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mb-4">
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
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" name="desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $factory->desc }}">
                                        @error('desc')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $factory->phone }}">
                                        @error('desc')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>           
                                      <div class="form-group col-md-6">
                                        <img src="{{ $factory->logo }}" class="img-fluid w-100 h-100 rounded" alt="...">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlTextarea1">Logo</label>
                                        <div class="custom-file">
                                          <input type="file" name="logo" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')