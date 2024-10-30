@extends('layouts.master')
@section('title')
    Update Department
@endsection
@section('main')
    <form action="{{ route('department.update', ['department' => $department->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row w-100 p-5">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Department</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-2 mb-2">
                            <label class="col-sm-2 fomr-col-label"> Name </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $department->name }}" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-label"> Description </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $department->description }}" name="description"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end" style="gap: 10px">
                        <button class="btn btn-success btn-block" style=""> Save Changed </button>
                        <a href="{{ route('department.index') }}" class="btn btn-danger btn-block"> Back </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
