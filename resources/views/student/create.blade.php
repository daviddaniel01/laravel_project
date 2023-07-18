@extends('layout.master');
@section('content')
    <form action="{{ route('student.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name">
        <br>
        Email
        <input type="text" name="email">
        <br>
        Password
        <input type="password" name="password">
        <br>
        Birthdate
        <input type="date" name="birthdate">
        <br>
        Gender
        <input type="radio" name="gender" value="0" checked>Nam
        <input type="radio" name="gender" value="1">Nữ
        <br>
        Avatar
        <input type="file" name="avatar">
        <br>
        Class
        <select name="course_id">
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>

        Status
        <br>
        @foreach ($arrStudentStatus as $option => $value)
            <input type="radio" name="status" value="{{ $value }}"
                @if ($loop->first) checked @endif>{{ $option }}
            <br>
        @endforeach


        <button>Create</button>
    </form>
@endsection
