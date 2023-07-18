@extends('layout.master')
@section('content')
    <a href="{{ route('courses.create') }}">Thêm</a>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Edit</th>
        </tr>
        @foreach ($data as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->name }}</td>
                <td>
                    <a href="{{ route('courses.edit', $each) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
