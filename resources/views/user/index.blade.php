@extends('layouts.master')
@section('title')
    Employee
@endsection


@section('main')
    <style>
        .img-thumbnail{
            height: 40px !important;
            width: 40px !important;
            object-fit: cover
        }
    </style>
    <h1>{{ session('test') }}</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="list-group w-auto p-3 m-5" style="border-radius: 10px; border:solid 1px;">
        <div class="list-group-item" style="background-color: #9de1d7" aria-current="true">
            <form action="/search" method="GET">
                <div class="d-flex justify-content-between align-items-center" style="background-color: #9de1d7;">
                    <h4 style="color: #FFFFFF;"><b>Employee List</b></h4>
                    <div>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary"
                            style="background-color: #3559E0;">Add New Employee</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">

                <thead class="">
                    <th class="p-3 col-0"> # </th>
                    <th class="p-3 col-2"> Profile </th>
                    <th class="p-3 col-0"> Gennder </th>
                    <th class="p-3 col-0"> Age </th>
                    <th class="p-3 col-2"> Email </th>
                    <th class="p-3 col-2"> DOB </th>
                    <th class="p-3 col-3"> Action </th>
                </thead>
                
                <tbody class="">
                    @forelse ($users as $user)
                        <tr>
                            <th class="p-3" scope="row"> {{ $user->id }} </th>
                            <td class="p-3" scope="row"> 
                                <img class="img-thumbnail rounded-circle"
                                    src="{{ asset('uploads/all_photo/' . $user->profile) }}" alt="">
                                    {{ $user->name }} 
                            </td>
                            <td class="p-3" scope="row"> {{ $user->gender }} </td>
                            <td class="p-3" scope="row"> {{ $user->age }} </td>
                            <td class="p-3" scope="row"> {{ $user->email }} </td>
                            <td class="p-3" scope="row"> {{ $user->dob }} </td>
                            <td class="p-3" scope="row">
                                <form method="POST" action="{{ route('employees.destroy', ['employee' => $user->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('employees.show', ['employee' => $user->id]) }}" type="button"
                                        class="btn view" style="background-color: #38E035;border: none;"><i
                                            class="fas fa-eye" style="color: #ffffff;"></i></a>
                                    <a href="{{ route('employees.edit', ['employee' => $user->id]) }}" type="button"
                                        class="btn edit" style="background-color: #3559E0;border: none;"><i
                                            class="fas fa-edit" style="color: #ffffff;"></i></a>
                                    <button class="btn trash" onclick="return confirm()"
                                        style="background-color: #FF0000;border: none;"><i class="fas fa-trash"
                                            style="color: #ffffff;"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">
                                <h5> No Data </h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        
    </div>
@endsection
