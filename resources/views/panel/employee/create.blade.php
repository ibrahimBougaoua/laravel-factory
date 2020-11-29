@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create new employee</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">New employee</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ Route('employee.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">First name</label>
                                        <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First name">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Last name</label>
                                        <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Last name">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Repeat Password</label>
                                        <input type="password" name="repassword" class="form-control" id="exampleInputPassword1" placeholder="Repeat Password">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Gender</label>
                                        <select class="form-control" name="gender" id="exampleFormControlSelect1">
                                          <option value="man">Man</option>
                                          <option value="woman">Woman</option>
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone number">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">City</label>
                                        <select class="form-control" name="city" id="exampleFormControlSelect1">
                                          <option value="alger">alger</option>
                                          <option value="anaba">anaba</option>
                                          <option value="tizi">tizi</option>
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlTextarea1">Address</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlTextarea1">Photo</label>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn btn-primary">Create new employee</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


@endsection('content')