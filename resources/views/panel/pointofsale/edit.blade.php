@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">
                    
                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('pointofsale.index') }}">point of sale</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Edit</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update point of sale</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('pointofsale.update',$pointOfSale->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $pointOfSale->id }}" />
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $pointOfSale->name }}">
                                        @error('name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select a factory</label>
                                        <select class="form-control" name="factory_id" id="exampleFormControlSelect1">
                                        @foreach($factories as $factory)
                                          @if($factory->id == $pointOfSale->factory_id)
                                            <option value="{{ $factory->id }}" selected="selected">{{ $factory->name }}</option>
                                          @else
                                            <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                          @endif
                                        @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Address</label>
                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="5">{{ $pointOfSale->address }}</textarea>
                                        @error('address')
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