@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('color.create')}}" class="btn btn-primary">
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
            @if($colors->count() > 0)
                @foreach ($colors as $color)
                <tr>
                    <th scope="row">{{ $color->id }}</th>
                    <td>{{ $color->name }}</td>
                    <td>
                        <a href="{{ route('color.show',$color->id) }}" class="btn btn-sm btn-info">more info</a>
                        <a href="{{ route('color.edit',$color->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('color.destroy', $color->id) }}" method="post" onsubmit="return confirm('Are U sure to Delete color -> {{ $color->name }}');"
                        class="d-inline" id="delete{{$color->id}}">
                        @csrf
                        @method('delete')
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm('Delete?') ? document.getElementById('delete{{$color->id}}').submit():false;">Delete</a>
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
