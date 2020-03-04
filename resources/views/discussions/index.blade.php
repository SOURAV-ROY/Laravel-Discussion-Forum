@extends('layouts.app')

@section('content')

    @foreach($discussions as $discussion)
        <div class="card">
            <div class="card-header text-center font-weight-bolder">
                <img src="{{Gravatar::src($discussion->user->email)}}"
                     class="float-left"
                     style="width: 30px; border-radius: 30%"
                     alt="{{$discussion->user->name}}"
                >
                <strong class="text-success">{{$discussion->title}}</strong>
            </div>

            <div class="card-body">
                {!! $discussion->detail !!}
            </div>
        </div>
        <br>
    @endforeach

    <div class="d-flex justify-content-center">
        {{$discussions->links()}}
    </div>

@endsection
