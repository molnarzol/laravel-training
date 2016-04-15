@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('src/css/modal.css') }}">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <section id="post-admin">
            <a href="{{ route('admin.blog.create_post') }}" class="btn">New Post</a>
        </section>
        <section class="list">
            @if( count($posts) == 0)
                No Posts
            @else
                @foreach($posts as $post)
                    <article>
                        <div class="post-info">
                            <h3>{{ $post->title }}</h3>
                            <span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
                        </div>

                        <div class="edit">
                            <ul>
                                <li><a href="{{ route('admin.blog.post', ['post_id' => $post->id, 'end' => 'admin']) }}">View Post</a></li>
                                <li><a href="{{ route('admin.blog.post.edit', ['post_id' => $post->id]) }}">Edit</a></li>
                                <li><a href="{{ route('admin.blog.post.delete', ['post_id' => $post->id]) }}" class="danger">Delete</a></li>
                            </ul>
                        </div>
                    </article>
                @endforeach
            @endif
        </section>

        @if( $posts->lastPage() > 1)
            <section class="pagination">
                @if( $posts->currentPage() !== 1 )
                    <a href="{{ $posts->previousPageUrl() }}"><i class="fa fa-caret-left"></i></a>
                @endif
                @if( $posts->currentPage() == $posts->lastPage() )
                    <a href="{{ $posts->nextPageUrl() }}"><i class="fa fa-caret-right"></i></a>
                @endif
            </section>
        @endif
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ Session::token() }}";
    </script>
    <script type="text/javascript" src="{{ URL::to('src/js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/contact-message.js') }}"></script>
@endsection