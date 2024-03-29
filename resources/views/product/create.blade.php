@extends('layouts.master')
@section('title')
    Create Product
@endsection
@section('main')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-2 w-100 p-3">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Product Name </label>
                            <div class="col-sm-12">
                                <input type="text" name="name" class="form-control" placeholder="Enter ProductName">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Description </label>
                            <div class="col-sm-12">
                                <input type="text" name="description" class="form-control"
                                    placeholder="Enter Description">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label for="category_id"> Category Name </label>
                            <select name="category_id" class="form-control" id="category_id">
                                <option selected> Select CategoryName</option>
                                @foreach ($categories as $category)
                                    @if ($category->userid === auth()->id())
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Price </label>
                            <div class="col-sm-12">
                                <input type="text" name="price" class="form-control" placeholder="Enter Price">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Quantity </label>
                            <div class="col-sm-12">
                                <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Expired Date </label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="expired_date">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label for="userid" class="col-sm-2 form-col-label">User Name</label>
                            <div class="col-sm-12">
                                <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload Image</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <label for="formFile" class="col-sm-2 form-col-label"> Image </label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="image" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                        <a href="{{ route('product.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
