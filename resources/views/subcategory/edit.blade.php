@extends('layout.app');

@section('content')
<div class="card">
    <div class="card-body">
    <form action="{{route('sub-category.update',$subCategory->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
            @method('PUT')
        <div class="mb-3">
            <label class="form-label">subCategory Name</label>
            <input type="text" class="form-control" name="sub_category_name" value="{{ $subCategory->sub_category_name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Category Name</label>
                <select name="category_id" class="form-control">
                    <option value="0">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $subCategory->category_id ) selected @endif>{{ $category->category_type }}</option>
                    @endforeach
                </select>
        </div>
        <div class="mb-3">
            <img src="{{asset($subCategory->image)}}" alt="image" width="100">
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
