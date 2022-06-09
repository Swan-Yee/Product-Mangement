@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <div class="d-inline-block">
        <form action="#" method="post" class="form-inline">
            <input class="form-control bg-white" placeholder="Search Product" id="search" type="text">
            <input type="submit" class="btn btn-sm btn-primary" value="Search">
        </form>
    </div>
    <a href="{{route('product.create')}}" class="btn btn-primary">
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
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Sub Category</th>
                <th class="col">Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <ul>
                        @foreach($product->SubCategory as $category)
                        <li>{{ $category->sub_category_name }}</li>
                        @endforeach
                    </ul>
                    </td>
                    <td>
                        <a href="{{ route('product.show',$product->id) }}" class="btn btn-sm btn-info">more info</a>
                        <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="post" onsubmit="return confirm('Are U sure to Delete Product -> {{ $product->name }}');"
                        class="d-inline" id="delete{{$product->id}}">
                        @csrf
                        @method('delete')
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm('Delete?') ? document.getElementById('delete{{$product->id}}').submit():false;">Delete</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
