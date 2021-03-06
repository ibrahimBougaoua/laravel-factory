@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('employee.index') }}">All employees</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Edit</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update employee</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('employee.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $employee->id }}" />
                                        <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">First name</label>
                                        <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->first_name }}">
                                        @error('first_name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Last name</label>
                                        <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->last_name }}">
                                        @error('last_name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->email }}">
                                        @error('email')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                      </div>
                                        @error('password')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      <div class="form-group col-md-4">
                                        <label for="exampleFormControlSelect1">Gender</label>
                                        <select class="form-control" name="gender" id="exampleFormControlSelect1">
                                          @foreach(genders() as $gender)
                                            @if($gender == $employee->gender)
                                            <option value="{{ $gender }}" selected="selected">{{ $gender }}</option>
                                            @else
                                            <option value="{{ $gender }}">{{ $gender }}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                        @error('gender')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->phone }}">
                                        @error('phone')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="exampleFormControlTextarea1">Address</label>
                                        <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $employee->address }}</textarea>
                                        @error('address')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">City</label>
                                        <select class="form-control" name="city" id="exampleFormControlSelect1">
                                          @foreach(list_of_city() as $city)
                                            @if($city == $employee->city)
                                            <option value="{{ $city }}" selected="selected">{{ $city }}</option>
                                            @else
                                            <option value="{{ $city }}">{{ $city }}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                        @error('city')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlTextarea1">Photo</label>
                                        <div class="custom-file">
                                          <input type="file" name="photo" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Update employee</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')