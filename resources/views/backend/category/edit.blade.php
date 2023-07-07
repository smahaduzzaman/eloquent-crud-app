<!doctype html>
<html lang="en">

@extends('backend.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card p-5">
                <h3 class="mb-3">Edit Category</h1>
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ $category->name }}" placeholder="Category Name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Category Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                value="{{ $category->description }}" placeholder="Category Description">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
