@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update point of sale</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update point of sale</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('salesman.update',[$salesMan->employee_id,$salesMan->point_sale_id,$salesMan->date]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select a point of sale</label>
                                        <select class="form-control" name="pointofsale_id" id="exampleFormControlSelect1">
                                        @foreach($pointsOfSales as $pointOfSale)
                                          @if( $pointOfSale->id == $salesMan->point_sale_id )
                                          <option value="{{ $pointOfSale->id }}" selected="selected">{{ $pointOfSale->name }}</option>
                                          @else
                                          <option value="{{ $pointOfSale->id }}">{{ $pointOfSale->name }}</option>
                                          @endif
                                        @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select an employee</label>
                                        <select class="form-control" name="employee_id" id="exampleFormControlSelect1">
                                        @foreach($employees as $employee)
                                          @if( $employee->id == $salesMan->employee_id )
                                          <option value="{{ $employee->id }}" selected="selected">{{ $employee->first_name }}</option>
                                          @else
                                          <option value="{{ $employee->id }}">{{ $employee->first_name }}</option>
                                          @endif
                                        @endforeach
                                        </select>
                                      </div>
                                      </div>
                                      <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')