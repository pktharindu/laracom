@extends('backend.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">New Product</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>Rs. {{ $product->price }}</td>
                <td class="text-right">
                    <a class="btn btn-outline-success btn-sm" href="{{ route('admin.products.show',$product->id) }}">Show</a>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id)}}" method="POST" style="display: inline-block">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fa fa-btn fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
</div>

<div class="row justify-content-center">
    {{ $products->links() }}
</div>
@endsection