@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">point of sale</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <div class="col-md-12">
                    <!-- Employees -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                        </div>
                        <div class="card-body">
							<div class="card">
							  <div class="card-body">
							    <h5 class="card-title">Details information</h5>
							    <p class="card-text">Name : {{ $pointOfSale->name }}</p>
							    <p class="card-text">Address : {{ $pointOfSale->address }}</p>
							    <p class="card-text">Status : {{ $pointOfSale->status }}</p>
							  </div>
							  <div class="card-body">
                                <a href="{{ route('pointofsale.edit',$pointOfSale->id) }}" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modal-{{ $pointOfSale->id }}">
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
                    <div class="modal fade" id="modal-{{ $pointOfSale->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this point of sale ?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">If you delete this point of sale, all of their work will disappear.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" href="{{ route('pointofsale.delete',$pointOfSale->id) }}">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    </div>

@endsection('content')