@extends('backend.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card p-5">
                <h3 class="mb-3">Create Category</h1>
                    {{-- option: 1 --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Category Name">
                            {{-- option: 2 --}}
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Category Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Category Description">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
