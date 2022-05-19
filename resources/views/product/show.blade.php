@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('product.index')}}" class="btn btn-primary">
        Back
    </a>
</div>
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-bold">Product Name</label>
            <p>{{ $product->name }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Price</label>
            <p>{{ $product->price }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <p>{{ $product->description }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Image</label><br>
            <img src="{{asset($product->image)}}" alt="{{ $product->image }}" width="300">
        </div>
    </div>
</div>
@endsection
