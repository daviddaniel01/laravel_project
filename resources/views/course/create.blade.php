@extends('layout.master');
@section('content')
    <form action="{{ route('course.store') }}" value="{{ old('name') }}" method="post">
        @csrf
        Name
        <input type="text" name="name">
        @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
        @endif
        <br>
        <button>Create</button>
    </form>
@endsection
