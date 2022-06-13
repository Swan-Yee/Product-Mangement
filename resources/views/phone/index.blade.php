@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('phone.create')}}" class="btn btn-primary">
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
                <th scope="col">Number</th>
                <th>Description</th>
                <th>Os</th>
                <th>Processor</th>
                <th>Color</th>
                <th>Brand</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            @if($phones->count() > 0)
                @foreach ($phones as $phone)
                <tr>
                    <th scope="row">{{ $phone->id }}</th>
                    <td>{{ $phone->model_name }}</td>
                    <td>{{ $phone->model_number }}</td>
                    <td>{{ $phone->description }}</td>
                    <td>{{ $phone->brand->name }}</td>
                    <td>{{ $phone->processor->name }}</td>
                    <td>{{ $phone->color->name }}</td>
                    <td>{{ $phone->operation_system->name }}</td>
                    <td>
                        <a href="{{ route('phone.show',$phone->id) }}" class="btn btn-sm btn-info">more info</a>
                        <a href="{{ route('phone.edit',$phone->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('phone.destroy', $phone->id) }}" method="post" onsubmit="return confirm('Are U sure to Delete phone -> {{ $phone->name }}');"
                        class="d-inline" id="delete{{$phone->id}}">
                        @csrf
                        @method('delete')
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm('Delete?') ? document.getElementById('delete{{$phone->id}}').submit():false;">Delete</a>
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
