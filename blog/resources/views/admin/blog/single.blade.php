@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('src/css/modal.css') }}">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')

        <section class="post-admin">
            <a href="{{ route('admin.blog.post.edit', ['post_id' => $post->id]) }}" class="btn">Edit Post</a>
            <a href="{{ route('admin.blog.post.delete', ['post_id' => $post->id]) }}" class="btn">Delete Posts</a>
        </section>

        <section class="post">
            <h1>{{ $post->title }}</h1>
            <span class="info">{{ $post->athor }} | {{ $post->created_at }}</span>
            <p>{{ $post->body }}</p>
        </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ Session::token() }}";
    </script>
    <script type="text/javascript" src="{{ URL::to('src/js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/contact-message.js') }}"></script>
@endsection