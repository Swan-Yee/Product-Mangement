@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('os.create')}}" class="btn btn-primary">
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
            @if($oses->count() > 0)
                @foreach ($oses as $os)
                <tr>
                    <th scope="row">{{ $os->id }}</th>
                    <td>{{ $os->name }}</td>
                    <td>
                        <a href="{{ route('os.show',$os->id) }}" class="btn btn-sm btn-info">more info</a>
                        <a href="{{ route('os.edit',$os->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('os.destroy', $os->id) }}" method="post" onsubmit="return confirm('Are U sure to Delete os -> {{ $os->name }}');"
                        class="d-inline" id="delete{{$os->id}}">
                        @csrf
                        @method('delete')
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm('Delete?') ? document.getElementById('delete{{$os->id}}').submit():false;">Delete</a>
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
