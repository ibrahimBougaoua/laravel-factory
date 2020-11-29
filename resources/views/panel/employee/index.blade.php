@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    @include('panel.alerts.success')

                    <!-- Employees -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>E-mail</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>E-mail</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$employee->first_name}}</td>
                                            <td>{{$employee->last_name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->gender}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td>{{$employee->city}}</td>
                                            <td>{{$employee->status}}</td>
                                            <td>        
                                                <a href="#" class="btn btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-flag"></i>
                                                    </span>
                                                    <span class="text">View</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modal-{{ $employee->id }}">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>

                                                <!-- delete Modal-->
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

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    </div>

@endsection('content')