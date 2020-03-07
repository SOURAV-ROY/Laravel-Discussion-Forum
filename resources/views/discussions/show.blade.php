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

            @if($discussion->bestReply)
                <div class="card my-3">
                    <div class="card card-header text-center bg-dark text-warning">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="{{Gravatar::src($discussion->bestReply->owner->email)}}"
                                     class="mr-2"
                                     style="width: 30px; height: 30px; border-radius: 30%"
                                     alt="{{$discussion->author->name}}"
                                >
                                <strong class="text-success">
                                    {{$discussion->bestReply->owner->name}}
                                </strong>
                            </div>
                            <div>
                                BEST REPLY
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-success text-white">
                        {!! $discussion->bestReply->answer !!}
                    </div>
                </div>
            @endif

        </div>
    </div>

    {{--***************************** REPLIES ********************************************--}}
    @foreach($discussion->replies()->paginate(5) as $reply)
        <div class="card my-2">
            <div class="card-header border border-success">
                <div class="d-flex justify-content-between">
                    <div>
                        <img
                            src="{{Gravatar::src($reply->owner->email)}}"
                            style="width: 30px; height: 30px; border-radius: 30%"
                            alt=""
                        >
                        <span class="text-danger font-weight-bold">{{$reply->owner->name}}</span>
                    </div>
                    <div>
                        @auth
                            @if(auth()->user()->id === $discussion->user_id)
                                <form
                                    action="{{route('discussions.best-reply',['discussion'=> $discussion->slug, 'reply'=> $reply->id])}}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info">Mark As Best Reply</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <div class="card-body border border-primary">
                {!! $reply->answer !!}
            </div>

        </div>
    @endforeach
    {{--*************************** END REPLIES ********************************************--}}

    <div class="d-flex justify-content-center">
        {{$discussion->replies()->paginate(5)->links()}}
    </div>

    <div class="card my-3">
        <div class="card-header text-primary text-center font-weight-bolder">
            Add New Reply
        </div>
        <div class="card-body">
            @auth
                <form action="{{route('replies.store', $discussion->slug)}}" method="POST">
                    @csrf
                    <input type="hidden" name="answer" id="answer">
                    <trix-editor input="answer"></trix-editor>
                    <div class="text-center my-2">
                        <button type="submit" class="btn btn-info">Send Reply</button>
                    </div>
                </form>
            @else
                <div class="text-center">
                    <a href="{{route('login')}}" class="btn btn-info">Sign To Reply</a>
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
