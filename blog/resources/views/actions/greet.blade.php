@extends('layouts.master')

@section('content')
<a href="{{ route('home') }}">Home</a>
<h1>
    Greet {{ $name === null ? 'you' : $name }}
</h1>
@endsection