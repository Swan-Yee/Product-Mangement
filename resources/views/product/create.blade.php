@extends('layout.app');

@section('content')
<div class="card">
    <div class="card-body">
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label class="form-label">Product Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="text" class="form-control" name="price">
  </div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Choose Sub Category</label>
    @foreach ($subCategories as $subCategory)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$subCategory->id}}" id="{{$subCategory->id}}" name="subCategoryId[]">
            <label class="form-check-label" for="{{$subCategory->id}}">
            {{ $subCategory->sub_category_name }}
            </label>
        </div>
    @endforeach
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
@endsection
