@extends('backend.layout.master')

@section('content')
    <div class="create-ctg">
        <a href="{{ route('categories.create') }}" class="btn btn-danger mb-5">Create Category</a>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">

            {{-- option: 1 --}}
            {{-- @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}

            {{-- option: 2 --}}
            {{-- @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif --}}

            {{-- option: 3 --}}
            @if (Session::has('success'))
                <div class="alert alert-success" id="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            <h3 class="mb-3">Show Categories</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('categories.show', $category->id) }}">Details</a>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                    {{-- <a class="btn btn-danger btn-sm" href="{{route('categories.destroy',$category->id)}}">Delete</a> --}}

                                    <form class="d-inline-block" action="{{ route('categories.destroy', $category->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure to delete data?')">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
