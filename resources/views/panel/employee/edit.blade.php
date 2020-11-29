@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update new employee</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update employee</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('employee.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $employee->id }}" />
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">First name</label>
                                        <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->first_name }}">
                                        @error('first_name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Last name</label>
                                        <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->last_name }}">
                                        @error('last_name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->email }}">
                                        @error('email')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                      </div>
                                        @error('password')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Repeat Password</label>
                                        <input type="password" name="repassword" class="form-control" id="exampleInputPassword1" placeholder="Repeat Password">
                                        @error('repassword')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
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
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->phone }}">
                                        @error('phone')
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
                                      <div class="form-group col-md-12">
                                        <label for="exampleFormControlTextarea1">Address</label>
                                        <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $employee->address }}</textarea>
                                        @error('address')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>                                        
                                      <div class="form-group col-md-6">
                                        <img src="{{ $employee->photo }}" class="img-fluid w-100 h-100 rounded" alt="...">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlTextarea1">Photo</label>
                                        <div class="custom-file">
                                          <input type="file" name="photo" class="custom-file-input" id="customFile">
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