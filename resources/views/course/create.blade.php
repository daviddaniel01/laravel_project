@extends('layout.master');
@section('content')
    <form action="{{ route('course.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name">
        <br>
        <button>Create</button>
    </form>
@endsection
