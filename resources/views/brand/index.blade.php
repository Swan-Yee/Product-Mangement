@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('brand.create')}}" class="btn btn-primary">
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            @if($brands->count() > 0)
                @foreach ($brands as $brand)
                <tr>
                    <th scope="row">{{ $brand->id }}</th>
                    <td>{{ $brand->name }}</td>
                    <td>
                        <a href="{{ route('brand.show',$brand->id) }}" class="btn btn-sm btn-info">more info</a>
                        <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('brand.destroy', $brand->id) }}" method="post" onsubmit="return confirm('Are U sure to Delete brand -> {{ $brand->name }}');"
                        class="d-inline" id="delete{{$brand->id}}">
                        @csrf
                        @method('delete')
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm('Delete?') ? document.getElementById('delete{{$brand->id}}').submit():false;">Delete</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <th>
                    No Data To Show
                </th>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
