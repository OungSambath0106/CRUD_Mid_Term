@extends('layouts.master')
@section('title')
    Update User
@endsection
@section('main')
    <form action="{{ route('employees.update', ['employee' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mt-2 w-100 p-3">
            <div class="col-md-8">
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Update Employee</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group mt-2 mb-2">
                            <label class="col-sm-2 fomr-col-label"> Name </label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $user->name }}" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-col-label"> Gender </label>
                            <div class="col-sm-12">
                                <select name="gender" class="form-select">
                                    <option value="" style="display:none;"> Select Gender </option>
                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}> Male </option>
                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}> Female
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-label"> Age </label>
                            <div class="col-sm-12">
                                <input type="tel" value="{{ $user->age }}" name="age" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-label"> Email </label>
                            <div class="col-sm-12">
                                <input type="email" value="{{ $user->email }}" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-label"> BOD </label>
                            <div class="col-sm-12">
                                <input type="date" value="{{ $user->dob }}" name="dob" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-1 mb-2">
                            <label class="col-sm-2 form-label"> Password </label>
                            <div class="col-sm-12">
                                <input type="password" value="{{ $user->password }}" name="password" class="form-control">
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
                            <div class="input-group">
                                <div class="custom-file">
                                    <label for="formFile" class="col-sm-2 form-col-label"> Profile </label>
                                    <div class="col-sm-12">
                                        <input name="profile" class="form-control me-4 mb-3" type="file" id="formFile"
                                            accept=".jpg, .jpeg, .png">
                                        <img style="width: 30vw; height: 34vh; object-fit: contain;"
                                            src="{{ asset('uploads/all_photo/' . $user->profile) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success btn-block"> Save Changed </button>
                        <a href="{{ route('employees.index') }}" class="btn btn-danger btn-block"> Back </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
@endsection
