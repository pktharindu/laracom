@extends('backend.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Product Details</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <tbody>
            <tr>
                <th>#</th>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>Rs. {{ $product->price }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img src="{{ $product->getFirstMedia('featured image')->getFullUrl() }}" alt="{{ $product->name }}" class="img-thumbnail img-fluid">
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection