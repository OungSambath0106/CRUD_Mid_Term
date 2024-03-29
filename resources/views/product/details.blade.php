@extends('layouts.master')
@section('title')
    View product
@endsection
@section('main')
    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mt-2 w-100 p-3">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">View product</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-2 mb-2">
                            <label class="col-sm-2 fomr-col-label"> Name </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $product->name }}" name="name" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label class="col-sm-2 fomr-col-label"> Description </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $product->description }}" name="description"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label for="category_id"> Category Name </label>
                            <input type="hidden" name="category_id" value="{{ $product->category_id }}">
                            <input type="text" class="form-control" id="category_id"
                                value="{{ $product->category->name }}" readonly>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-label"> Price </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $product->price }}" name="price" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-label"> Quantity </label>
                            <div class="col-sm-12">
                                <input type="number" value="{{ $product->quantity }}" name="quantity" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-label"> Expired Date </label>
                            <div class="col-sm-12">
                                <input type="date" value="{{ $product->expired_date }}" name="expired_date"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label for="userid">User Name</label>
                            <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
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
                                    <label for="formFile" class="col-sm-2 mb-3 form-col-label"> Image </label>
                                    <div class="col-sm-12">
                                        <img style="width: 30vw; height: 34vh; object-fit: contain;"
                                            src="{{ asset('uploads/all_photo/' . $product->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('product.index') }}" class="btn btn-danger btn-block w-25"> Back </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
