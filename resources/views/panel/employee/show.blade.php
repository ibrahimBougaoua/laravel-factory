@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">
                    
                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('employee.index') }}">All employees</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Show</a>
                        </nav>
                    </div>

                    <div class="col-md-12">
                    <!-- Employees -->
                    <div class="card shadow mt-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                        </div>
                        <img src="{{ $employee->photo }}" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
							<div class="card">
							  <div class="card-body">
							    <h5 class="card-title">Details information</h5>
							    <p class="card-text">First name : {{ $employee->first_name }}</p>
							    <p class="card-text">Last name : {{ $employee->last_name }}</p>
							    <p class="card-text">Email : {{ $employee->email }}</p>
							    <p class="card-text">Gender : {{ $employee->gender }}</p>
							    <p class="card-text">Phone : {{ $employee->phone }}</p>
							    <p class="card-text">City : {{ $employee->city }}</p>
							    <p class="card-text">Address : {{ $employee->address }}</p>
							    <p class="card-text">Status : {{ $employee->status }}</p>
							  </div>
							  <div class="card-body">
                                <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-success btn-icon-split mr-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modal-{{ $employee->id }}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Delete</span>
                                </a>
							  </div>
							</div>
                        </div>
                    </div>

                    <!-- delete Modal -->
                    <div class="modal fade" id="modal-{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this employee ?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">If you delete this employee, all of their work will disappear.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" href="{{ route('employee.delete',$employee->id) }}">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    </div>

@endsection('content')