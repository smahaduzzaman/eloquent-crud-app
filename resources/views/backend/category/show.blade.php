@extends('backend.layout.master')
@section('title', 'Show Category Details')

@section('content')



    <div class="row">
        <div class="col-md-6">
            <div class="card p-5">
                <h5>{{ $category->name }}</h5>
                <p>{{ $category->description }}</p>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm mt-3">Back</a>
        </div>
    </div>

@endsection
