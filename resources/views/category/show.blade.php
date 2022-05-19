@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('category.index')}}" class="btn btn-primary">
        Back
    </a>
</div>
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-bold">Category Name</label>
            <p>{{ $category->category_type }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Image</label><br>
            <img src="{{asset($category->image)}}" alt="{{ $category->image }}" width="300">
        </div>
    </div>
</div>
@endsection
