@extends('layout.master')
@section('content')
    <a href="{{ route('teachers.create') }}">Thêm</a>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        @foreach ($data as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->name }}</td>
                <td>{{ $each->email }}</td>
                <td>{{ $each->gender_name }}</td>
                <td>{{ $each->age }}</td>
                <td>{{ $each->status }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('teachers.edit', $each) }}">
                            Edit
                        </a>
                        <form action="{{ route('teachers.destroy', $each) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
