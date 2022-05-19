@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('sub-category.create')}}" class="btn btn-primary">
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
                <th scope="col">Category_Type</th>
                <th class="col">Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($sub_categories as $sub_category)
                <tr>
                    <th scope="row">{{ $sub_category->id }}</th>
                    <td>{{ $sub_category->sub_category_name }}</td>
                    <td>{{ $sub_category->category->category_type }}</td>
                    <td>
                        <img src="{{asset($sub_category->image)}}" alt="image" width="100">
                    </td>
                    <td>
                        <a href="{{ route('sub-category.show',$sub_category->id) }}" class="btn btn-sm btn-info">more info</a>
                        <a href="{{ route('sub-category.edit',$sub_category->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('sub-category.destroy', $sub_category->id) }}" method="post" onsubmit="return confirm('Are U sure to Delete sub_category -> {{ $sub_category->name }}');"
                        class="d-inline" id="delete{{$sub_category->id}}">
                        @csrf
                        @method('delete')
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm('Delete?') ? document.getElementById('delete{{$sub_category->id}}').submit():false;">Delete</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
