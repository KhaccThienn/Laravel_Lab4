@extends('layouts.app')

@section('main')
    <div class="container">
        <h2>List Categories</h2>
        <a href="{{ route('category.create') }}" class="btn btn-outline-success">&plus; New Category</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cates as $cate)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $cate->id }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>{{ $cate->status == 1 ? 'Show' : 'Hide' }}</td>
                        <td>
                            <form action="{{ route('category.delete', $cate->id) }}" method="post">
                                <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-outline-success">Update</a>
                                @method('DELETE') @csrf
                                <button class="btn btn-outline-danger"
                                    onclick="return confirm('Do you want to delete this category ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <h4>0 Data Returned</h4>
                @endforelse

            </tbody>
        </table>
        {{ $cates->links() }}
    </div>
@endsection
