@extends('backend.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    <div class="row">
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="field-required">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Enter name" autofocus required>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label for="price" class="field-required">Price</label>
                <input type="text" name="price" class="form-control" value="{{ $product->price * 100 }}" placeholder="Price in cents" required>
                @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }}">
                <label for="featured_image" class="field-required">Image</label>
                <div class="image-wrapper">
                    <div class="image-item">
                        <img src="{{ $product->getFirstMedia('featured image')->getFullUrl() }}" alt="{{ $product->name }}" class="img-thumbnail img-fluid">
                    </div>
                </div>
                <p><small>Note: uploading a new image will replace the existing one.</small></p>
                <input type="file" name="featured_image" class="form-control"/>
                <span class="help-block">
                    <strong>{{ $errors->first('featured_image') }}</strong>
                </span>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="field-required">Description</label>
                <textarea type="text"  name="description" class="form-control" placeholder="Enter Description" rows="8" required>{{ $product->description }}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>  

    <div class="mt-4">
        <button type="submit" class="btn btn-sm btn-success">
            Update
        </button>
        <a class="btn btn-sm btn-link" href="{{ route('admin.products.index')}}">
            Cancel
        </a>
    </div>
</form>

@endsection