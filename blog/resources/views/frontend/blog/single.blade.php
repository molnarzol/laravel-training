@extends('layouts.master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <span class="subtitle">{{ $post->athor }} | {{ $post->created_at }}</span>
        <p>{{ $post->body }}</p>
    </article>

@endsection