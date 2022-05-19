@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('category.create')}}" class="btn btn-primary">
        Create
    </a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th class="col">Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->category_type }}</td>
                    <td>
                        <img src="{{asset($category->image)}}" alt="image" width="100">
                    </td>
                    <td>
                        <a href="{{ route('category.show',$category->id) }}" class="btn btn-sm btn-info">more info</a>
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="post" onsubmit="return confirm('Are U sure to Delete category -> {{ $category->name }}');"
                        class="d-inline" id="delete{{$category->id}}">
                        @csrf
                        @method('delete')
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm('Delete?') ? document.getElementById('delete{{$category->id}}').submit():false;">Delete</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
