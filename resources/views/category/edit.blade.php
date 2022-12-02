@extends('layouts.app')

@section('main')
    <div class="container">
        <h2>Form Edit Category: {{ $cate->name }}</h2>
        <form action="{{ route('category.update', $cate->id) }}" role="form" method="post">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" value="{{ $cate->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="status1" value="1" {{ $cate->status == 1 ? 'checked' : '' }}>
                    Show
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="status1" value="0" {{ $cate->status == 0 ? 'checked' : '' }}>
                    Hide
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
