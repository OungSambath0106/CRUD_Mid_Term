@extends('layouts.master')
@section('title')
    View Category
@endsection
@section('main')
    <form action="{{ route('employees.update', ['employee' => $category->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row w-100 p-5">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">View Category</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-1">
                            <label class="col-sm-2 fomr-col-label"> Name </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $category->name }}" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-1">
                            <label class="col-sm-2 form-label"> Description </label>
                            <div class="col-sm-12">
                                <input type="tel" value="{{ $category->description }}" name="description" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('category.index') }}" class="btn btn-danger btn-block" style="margin-left: 83vw; width:7vw;"> Back </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
