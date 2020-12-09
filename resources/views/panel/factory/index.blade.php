@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link disabled" href="#">All factoreis</a>
                        </nav>
                    </div>

                    @include('panel.alerts.success')
                    @include('panel.alerts.errors')

                    <div class="col-md-12">
                    <!-- factories -->
                    <div class="card shadow mt-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Factories</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($factories as $factory)
                                        <tr>
                                            <td>{{$factory->name}}</td>
                                            <td class="text-break">{{limit_text($factory->desc,140)}}</td>
                                            <td>{{$factory->status}}</td>
                                            <td>        
                                                <a href="{{ route('factory.show',$factory->id) }}" class="btn btn-sm btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">View</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('factory.edit',$factory->id) }}" class="btn btn-sm btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-danger btn-icon-split" data-toggle="modal" data-target="#modal-{{ $factory->id }}">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>

                                                <!-- delete Modal-->
                                                <div class="modal fade" id="modal-{{ $factory->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this factory ?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">If you delete this factory, all of their work will disappear.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <a class="btn btn-danger" href="{{ route('factory.delete',$factory->id) }}">Delete</a>
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

                      <!--Pagination-->
                      <div class="d-flex">
                          <div class="mx-auto">
                              {{$factories->links("pagination::bootstrap-4")}}
                          </div>
                      </div>
                      <!--Pagination-->

                    </div>
                    </div>

                    </div>

@endsection('content')