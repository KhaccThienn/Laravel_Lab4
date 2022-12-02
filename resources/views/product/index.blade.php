@extends('layouts.app')

@section('main')
    <div class="container-fluid">
        <h2>List Products</h2>
        <a href="{{ route('product.create') }}" class="btn btn-primary"> &plus; New Product</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Date Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prods as $prod)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $prod->id }}</td>
                        <td>{{ $prod->name }}</td>
                        <td>{{ $prod->price }}</td>
                        <td>{{ $prod->CateName }}</td>
                        <td class="w-25">
                            <img src="uploads/{{ $prod->image }}" alt="{{ $prod->name }}" class="card-img">
                        </td>
                        <td>{{ $prod->created_at }}</td>
                        <td>
                            <form action="{{ route('product.delete', $prod->id) }}" method="post">
                                <a href="{{ route('product.edit', $prod->id) }}"
                                    class="btn btn-outline-success">Update</a>
                                @method('DELETE') @csrf
                                <button class="btn btn-outline-danger"
                                    onclick="return confirm('Do you want to delete this product ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $prods->links() }}
    </div>
@endsection
