@extends('layouts.app')

@section('content')

    @foreach($discussions as $discussion)
        <div class="card">

            @include('partials.discussion-header')

            <div class="text-center card-body">
                <strong>{{ $discussion->title }}</strong>
            </div>

        </div>

        <br>

    @endforeach

    <div class="d-flex justify-content-center">
        {{$discussions->appends(['channel'=> request()->query('channel')])->links()}}
    </div>

@endsection
