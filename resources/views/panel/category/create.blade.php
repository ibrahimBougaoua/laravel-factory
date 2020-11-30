@extends('layouts.panel')

@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create new category</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">New category</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                        @error('name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                        @error('slug')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Descrition</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Descrition"></textarea>
                                        @error('descrition')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Parent/Child</label>
                                        <select class="form-control" name="subcateid" id="exampleFormControlSelect1">
                                        <option value="0">Parent</option>
                                          @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                              @if($category->subcateid == 0)
                                                Parent - {{ $category->name }}
                                              @else
                                                Child - {{ $category->name }}
                                              @endif
                                            </option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlTextarea1">Photo</label>
                                        <div class="custom-file">
                                          <input type="file" name="photo" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn btn-primary">Create new Category</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')