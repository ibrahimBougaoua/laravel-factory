@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('category.index') }}">categoreis</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Show</a>
                        </nav>
                    </div>

                    <div class="col-md-12">
                    <!-- Employees -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                        </div>
                        <img src="{{ $category->photo }}" class="card-img-top" alt="...">
                        <div class="card-body">
							<div class="card">
							  <div class="card-body">
							    <h5 class="card-title">Details information</h5>
                                <p class="card-text">Name : {{ $category->name }}</p>
							    <p class="card-text">Slug : {{ $category->slug }}</p>
							    <p class="card-text">Description : {{ $category->description }}</p>
                                <p class="card-text">Status : {{ $category->status }}</p>
							    <p class="card-text">Parent/Child : {{ $category->subcateid }}</p>
							    <p class="card-text">Created at : {{ get_date($category->created_at) }}</p>
							  </div>
							  <div class="card-body">
                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-success btn-icon-split mr-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modal-{{ $category->id }}">
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
                    <div class="modal fade" id="modal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this category ?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">If you delete this category, all of their work will disappear.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" href="{{ route('category.delete',$category->id) }}">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    </div>

@endsection('content')