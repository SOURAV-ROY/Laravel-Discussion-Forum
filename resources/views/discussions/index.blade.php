@extends('layouts.app')

@section('content')

    @foreach($discussions as $discussion)
        <div class="card">

            <div class="card-header text-center font-weight-bolder">
                <img src="{{Gravatar::src($discussion->author->email)}}"
                     class="float-left"
                     style="width: 30px; height: 30px; border-radius: 30%"
                     alt="{{$discussion->author->name}}"
                >
                <strong class="text-success float-left mt-1 ml-1">{{$discussion->author->name}}</strong>
                <h5 class="float-right font-weight-bolder mt-1">
                    <a href="{{route('discussions.show', $discussion->slug)}}"
                       style="text-decoration: none;">
                        VIEW
                    </a>
                </h5>
            </div>

            <div class="text-center card-body">
                {!! $discussion->title !!}
            </div>

        </div>
        <br>
    @endforeach

    <div class="d-flex justify-content-center">
        {{$discussions->links()}}
    </div>

@endsection
