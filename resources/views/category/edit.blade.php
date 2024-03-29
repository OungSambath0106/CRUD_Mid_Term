@extends('layouts.master')
@section('title')
    Update Category
@endsection
@section('main')
    <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row w-100 p-5">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Category</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-2 mb-2">
                            <label class="col-sm-2 fomr-col-label"> Name </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $category->name }}" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-label"> Description </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $category->description }}" name="description"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label for="userid" class="col-sm-2 form-label"> UserName </label>
                            <div class="col-sm-12">
                                <input type="hidden" value="{{ auth()->user()->id }}" readonly name="userid"
                                    class="form-control">
                                <input type="text" value="{{ auth()->user()->name }}" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success btn-block" style="margin-left: 77vw;"> Save Changed </button>
                        <a href="{{ route('category.index') }}" class="btn btn-danger btn-block"> Back </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
