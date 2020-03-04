@extends('layouts.app')

@section('content')
    <div class="card">

        @include('partials.discussion-header')

        <div class="card-body">
            <div class="text-center text-danger">
                <strong>{{$discussion->title }}</strong>
            </div>
            <hr>
            {!! $discussion->detail !!}
        </div>
    </div>

    <div class="card my-3">
        <div class="card-header text-primary text-center font-weight-bolder">
            Add a Reply
        </div>
        <div class="card-body">
            @auth
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="reply" id="reply">
                    <trix-editor input="reply"></trix-editor>
                </form>
            @else
                <div class="text-center">
                    <a href="{{route('login')}}" class="btn btn-primary">Sign To Reply</a>
                </div>
            @endauth
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
