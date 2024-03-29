@extends('layouts.master')
@section('title')
    Category
@endsection


@section('main')
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

    <div class="list-group w-auto p-3 mt-5" style="border-radius: 10px; border:solid 1px;">
        <div class="list-group-item" style="background-color: #9de1d7" aria-current="true">
            <form action="/search" method="GET">
                <div class="d-flex justify-content-between align-items-center" style="background-color: #9de1d7;">
                    <h4 style="color: #FFFFFF;"><b>Category List</b></h4>
                    <div>
                        <a href="{{ route('category.create') }}" class="btn btn-primary"
                            style="background-color: #3559E0;">Add New Category</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="">
                    <th class="p-3 col-2"> # </th>
                    <th class="p-3 col-4"> Name </th>
                    <th class="p-3 col-4"> Description </th>
                    <th class="p-3 col-3"> Action </th>
                </thead>
                <tbody class="">
                    @forelse ($category as $cat)
                        <tr>
                            <th class="p-3" scope="row"> {{ $cat->id }} </th>
                            <td class="p-3" scope="row"> {{ $cat->name }} </td>
                            <td class="p-3" scope="row"> {{ $cat->description }} </td>
                            <td class="p-3" scope="row">
                                <form method="POST" action="{{ route('category.destroy', ['category' => $cat->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('category.show', ['category' => $cat->id]) }}" type="button"
                                        class="btn view" style="background-color: #38E035;border: none;"><i
                                            class="fas fa-eye" style="color: #ffffff;"></i></a>
                                    <a href="{{ route('category.edit', ['category' => $cat->id]) }}" type="button"
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
