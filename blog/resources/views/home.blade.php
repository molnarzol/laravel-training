@extends('layouts.master')

@section('content')
    <div class="centered">
        <p>
            Lorem ipsum bla bla
        </p>
        <ul>
            @for($i = 0; $i < 5; $i++)
                @if( $i % 2 === 0)
                    <li>Iteration {{ $i + 1 }}</li>
                @endif
            @endfor
        </ul>

        <div>
            <a href="{{ route('niceaction', ['action' => 'greet']) }}">Greet</a>
            <a href="{{ route('niceaction', ['action' => 'hug']) }}">Hug</a>
            <a href="{{ route('niceaction', ['action' => 'kiss']) }}">Kiss</a>
        </div>

        <div>
            <br>
            @if( count($errors) > 0 )
                <div>
                    <ul>
                        @foreach( $errors->all() as $error )
                            {{ $error }}
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('benice')}}" method="post">
                <label form="elect-action">I want to ...</label>
                <select id="select-action" name="action">
                    <option value="greet">Greet</option>
                    <option value="hug">Hug</option>
                    <option value="kiss">Kiss</option>
                </select>
                <input type="text" name="name">
                <button type="submit">Do</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </div>
@endsection