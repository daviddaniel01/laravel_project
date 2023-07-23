@extends('layout.master')
@section('content')
    <form action="{{ route('students.store') }}" method="post">
        @csrf
        @method('PUT')
        Name
        <input type="text" name="name" value="{{ $each->name }}">
        @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
        @endif
        <br>
        Email
        <input type="text" name="email" value="{{ $each->email }}">
        @if ($errors->has('email'))
            <span class="error">
                {{ $errors->first('email') }}
            </span>
        @endif
        <br>

        Password
        <input type="password" name="password" value="{{ $each->password }}"">
        @if ($errors->has('password'))
            <span class="error">
                {{ $errors->first('password') }}
            </span>
        @endif
        <br>
        Birthdate
        <input type="date" name="birthdate" value="{{ $each->birthdate }}">
        @if ($errors->has('birthdate'))
            <span class="error">
                {{ $errors->first('birthdate') }}
            </span>
        @endif
        <br>
        Gender
        <input type="radio" name="gender" value="0" {{ $each->gender == 0 ? 'checked' : '' }}>Nam
        <input type="radio" name="gender" value="1" {{ $each->gender == 1 ? 'checked' : '' }}>Nữ
        @if ($errors->has('gender'))
            <span class="error">
                {{ $errors->first('gender') }}
            </span>
        @endif
        <br>
        Avatar
        <input type="file" name="avatar" value="{{ $each->avatar }}">
        @if ($errors->has('avatar'))
            <span class="error">
                {{ $errors->first('avatar') }}
            </span>
        @endif

        <br>
        Status
        <br>
        @foreach ($arrStudentStatus as $option => $value)
            <input type="radio" name="status" value="{{ $value }}"
                @if ($each->status == $option) checked @endif>{{ $option }}
        @endforeach

        @if ($errors->has('status'))
            <span class="error">
                {{ $errors->first('status') }}
            </span>
        @endif
        <br>
        <button>Update</button>
    </form>
@endsection
