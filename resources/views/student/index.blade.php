@extends('layout.master')
@section('content')
    <a href="{{ route('student.create') }}">Thêm</a>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
        </tr>
        @foreach ($data as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->name }}</td>
                <td>{{ $each->gender }}</td>
                <td>{{ $each->age }}</td>
            </tr>
        @endforeach
    </table>
@endsection
