@extends('layouts.master')
@section('title')
    Create User
@endsection
@section('main')
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-2 w-100 p-3">
            <div class="col-md-8">
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Create New</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Name </label>
                            <div class="col-sm-12">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Gender </label>
                            <div class="col-sm-12">
                                <select name="gender" class="form-select">
                                    <option value="" style="display: none;"> Select Gender </option>
                                    <option value="male"> Male </option>
                                    <option value="female"> Female </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Age </label>
                            <div class="col-sm-12">
                                <input type="text" name="age" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Email </label>
                            <div class="col-sm-12">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> DOB </label>
                            <div class="col-sm-12">
                                <input type="date" name="dob" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Password </label>
                            <div class="col-sm-12">
                                <input type="password" name="password" class="form-control">
                            </div>
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
                            <!-- Image preview element -->
                            <div class="input-group">
                                <div class="custom-file">
                                    <label for="formFile" class="col-sm-2 form-col-label"> Profile </label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="profile" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection