@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('sub-category.index')}}" class="btn btn-primary">
        Back
    </a>
</div>
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-bold">Sub Category Name</label>
            <p>{{ $subCategory->sub_category_name }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Image</label><br>
            <img src="{{asset($subCategory->image)}}" alt="{{ $subCategory->image }}" width="300">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Category</label><br>
            <p>{{ $subCategory->category->category_type }}</p>
        </div>
    </div>
</div>
@endsection
