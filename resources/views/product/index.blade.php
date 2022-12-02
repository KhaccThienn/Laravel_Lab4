@extends('layouts.app')

@section('main')
    <div class="container-fluid">
        <h2>List Products</h2>

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
                        <td>{{ $prod->image }}</td>
                        <td>{{ $prod->created_at }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $prods->links() }}
    </div>
@endsection
