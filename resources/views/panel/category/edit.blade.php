@extends('layouts.panel')

@section('content')

                    <!-- Content Row -->
                    <div class="row">
                    
                    <!-- Page Heading -->
                    <div class="col-md-12">
                        <nav class="nav navbar-light bg-white shadow p-1">
                          <a class="nav-link" href="{{ route('category.index') }}">categories</a>
                          <a class="nav-link disabled" href="#">/</a>
                          <a class="nav-link disabled" href="#">Edit</a>
                        </nav>
                    </div>

                        <div class="col-md-12">
                            <!-- Employees -->
                            <div class="card shadow mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update category</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $category->id }}" />
                                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->name }}">
                                        @error('name')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->slug }}">
                                        @error('slug')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Descrition</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $category->description }}</textarea>
                                        @error('description')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Parent/Child</label>
                                        <select class="form-control" name="subcateid" id="exampleFormControlSelect1">
                                        <option value="0">Parent</option>
                                        @foreach($categories as $_category)
                                          @if($_category->id == $category->id)
                                            <option value="{{ $_category->id }}" selected="selected">
                                              @if($category->subcateid == 0)
                                                Parent - {{ $category->name }}
                                              @else
                                                Child - {{ $category->name }}
                                              @endif
                                            </option>
                                          @else
                                            <option value="{{ $_category->id }}">
                                              @if($_category->subcateid == 0)
                                                Parent - {{ $_category->name }}
                                              @else
                                                Child - {{ $_category->name }}
                                              @endif
                                            </option>
                                          @endif
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
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Update category</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection('content')