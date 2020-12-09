@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('salesman.index') }}">sales man</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Create new</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">New Sales Man</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('salesman.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select a point of sale</label>
                                        <select class="form-control" name="pointofsale_id" id="exampleFormControlSelect1">
                                        @foreach($pointsOfSales as $pointOfSale)
                                          <option value="{{ $pointOfSale->id }}">{{ $pointOfSale->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select an employee</label>
                                        <select class="form-control" name="employee_id" id="exampleFormControlSelect1">
                                        @foreach($employees as $employee)
                                          <option value="{{ $employee->id }}">{{ $employee->first_name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                      </div>
                                      <button type="submit" class="btn btn-primary">Create new sales man</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')