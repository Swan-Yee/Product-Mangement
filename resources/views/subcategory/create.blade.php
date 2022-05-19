@extends('layout.app');

@section('content')
<div class="card">
    <div class="card-body">
    <form action="{{route('sub-category.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label class="form-label">Sub Category Name</label>
        <input type="text" class="form-control" name="sub_category_name">
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Category Type</label>
        <select name="category_id" class="form-control">
            <option value="0">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{ $category->category_type }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
@endsection
