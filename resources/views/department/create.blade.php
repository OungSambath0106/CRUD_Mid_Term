@extends('layouts.master')
@section('title')
    Create Employee
@endsection
@section('main')
    <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row w-100 p-5">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-sm-2 form-col-label"> Name </label>
                            <div class="col-sm-12">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 form-col-label"> Description </label>
                            <div class="col-sm-12">
                                <input type="text" name="description" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                        <a href="{{ route('department.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
