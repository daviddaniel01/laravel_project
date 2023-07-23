@extends('layout.master')
@section('content')
    <a href="{{ route('semesters.create') }}">Thêm</a>
    <table class="table table-striped">
        <tr>
            <th>Kì học</th>
            <th>Môn học</th>
            <th>Sinh viên</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $each)
            <tr>
                <td>{{ $each->name }}</td>
                <td>{{ $each->course->name }}</td>
                <td>{{ $each->student->name }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('semesters.edit', $each) }}">
                            Edit
                        </a>
                        <form action="{{ route('semesters.destroy', $each) }}" method="post">
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
