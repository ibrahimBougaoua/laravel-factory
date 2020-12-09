@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">
                    
                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('pointofsale.index') }}">point of sale</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Create new</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mt-3">
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
                                        <label for="exampleFormControlSelect1">Select a factory</label>
                                        <select class="form-control" name="factory" id="exampleFormControlSelect1">
                                        @foreach($factories as $factory)
                                          <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Address</label>
                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="5"></textarea>
                                        @error('address')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Create new point of sale</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')