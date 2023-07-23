<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('layout.master')
@section('content')
    <form action="{{ route('semesters.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
        @endif
        <br>
        Môn học
        <select name="course_id">
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}-{{ $course->teacher->name }}</option>
            @endforeach
        </select>
        <br>
        Sinh viên
        <select name="student_id">
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
        <br>
        <button>Create</button>
    </form>
@endsection
