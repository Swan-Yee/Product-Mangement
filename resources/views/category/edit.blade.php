@extends('layout.app');

@section('content')
<div class="card">
    <div class="card-body">
    <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
            @method('PUT')
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" class="form-control" name="category_type" value="{{ $category->category_type }}">
        </div>
        <div class="mb-3">
            <img src="{{asset($category->image)}}" alt="image" width="100">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection
