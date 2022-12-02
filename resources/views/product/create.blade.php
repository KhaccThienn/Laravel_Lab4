@extends('layouts.app')

@section('main')
    <div class="container p-5">
        <h2>Form Add New Product</h2>
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($cates as $cate)
                        <option value="{{ $cate->id }}"> {{ $cate->id }} - {{ $cate->name }} </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="status1" value="1" checked>
                    In Stock
                </label>
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="status2" value="0">
                    Out Of Stock
                </label>
            </div>
            <button type="submit" class="btn btn-success mt-5">Submit</button>
        </form>
    </div>
@endsection
