@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create new point of sale</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">New point of sale</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('pointofsale.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                                        @error('name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
                                        @error('address')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select a factory</label>
                                        <select class="form-control" name="factory" id="exampleFormControlSelect1">
                                        @foreach($factories as $factory)
                                          <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                      <button type="submit" class="btn btn-primary">Create new point of sale</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')