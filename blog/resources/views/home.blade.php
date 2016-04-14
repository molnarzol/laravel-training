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
            @foreach($actions as $action)
                <a href="{{ route('niceaction', ['action' => lcfirst($action->name)]) }}">{{$action->name}}</a>
            @endforeach
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
            <form action="{{route('add_action')}}" method="post">
                <label for="name">Name of action</label>
                <input type="text" name="name" id="name">
                <label for="niceness">niceness</label>
                <input type="text" name="niceness" id="niceness">
                <button type="submit">Do</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>

        <div>
            <ul>
                @foreach($logged_actions as $logged_action)
                    <li>
                        {{$logged_action->nice_action->name}}
                        @foreach($logged_action->nice_action->categories as $category)
                            {{$category->name}}
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection