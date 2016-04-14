@extends('layouts.master')

@section('title')
    Administration
@endsection

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection

@section('content')
    @if( count($errors) > 0 )
        <section class="info-box fail">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        </section>
    @endif

    @if(  Session::has('fail') )
        <section class="info-box fail">
            {{ Session::get('fail') }}
        </section>
    @endif

    <section class="edit-quote">
        <form method="post" action="{{ route('admin.login') }}">
            <div class="input-group">
                <label for="admin">Your Name</label>
                <input type="text" name="admin" id="admin" placeholder="Your Admin Name">
            </div>

            <div class="input-group">
                <label for="password">Your Email</label>
                <input type="password" name="password" id="password" placeholder="Your Password">
            </div>

            <button type="submit" class="btn">Login</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </section>
@endsection