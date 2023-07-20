@extends('layout.master');
@section('content')
    <form action="{{ route('teachers.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name">
        @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
        @endif
        <br>
        Email
        <input type="text" name="email">
        @if ($errors->has('email'))
            <span class="error">
                {{ $errors->first('email') }}
            </span>
        @endif
        <br>
        Password
        <input type="password" name="password">
        @if ($errors->has('password'))
            <span class="error">
                {{ $errors->first('password') }}
            </span>
        @endif
        <br>
        Birthdate
        <input type="date" name="birthdate">
        @if ($errors->has('birthdate'))
            <span class="error">
                {{ $errors->first('birthdate') }}
            </span>
        @endif
        <br>
        Gender
        <input type="radio" name="gender" value="0" checked>Nam
        <input type="radio" name="gender" value="1">Nữ
        @if ($errors->has('gender'))
            <span class="error">
                {{ $errors->first('gender') }}
            </span>
        @endif
        <br>
        Avatar
        <input type="file" name="avatar">
        @if ($errors->has('avatar'))
            <span class="error">
                {{ $errors->first('avatar') }}
            </span>
        @endif
        <br>
        Course
        <select name="course_id">
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('course_id'))
            <span class="error">
                {{ $errors->first('course_id') }}
            </span>
        @endif
        <br>
        Status
        <br>
        @foreach ($arrTeacherStatus as $option => $value)
            <input type="radio" name="status" value="{{ $value }}"
                @if ($loop->first) checked @endif>{{ $option }}
        @endforeach
        @if ($errors->has('status'))
            <span class="error">
                {{ $errors->first('status') }}
            </span>
        @endif
        <br>
        <button>Create</button>
    </form>
@endsection
