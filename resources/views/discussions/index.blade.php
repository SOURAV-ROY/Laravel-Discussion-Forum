@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($discussions as $discussion)
            <div class="card">
                <div class="card-header text-center font-weight-bolder">
                    {{$discussion->title}}
                </div>

                <div class="card-body">
                    {!! $discussion->detail !!}
                </div>
            </div>
        @endforeach
        <br>
        <div class="d-flex justify-content-center">
            {{$discussions->links()}}
        </div>
    </div>

@endsection
