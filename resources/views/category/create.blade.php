@extends('layout.app');

@section('content')
<div class="card">
    <div class="card-body">
    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label class="form-label">Category Name</label>
    <input type="text" class="form-control" name="category_type">
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
