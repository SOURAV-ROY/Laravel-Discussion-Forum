@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold">All Notifications</div>

        <div class="card-body">

            <ul class="list-group">
                @foreach($notifications as $notification)
                    <div class="list-group-item">
                        @if($notification->type === 'LaravelForum\Notifications\NewReplyAdded')
                            {{--                            A New Reply Added to Your Discussion--}}

                            {{$notification->data['discussion']['title']}}

                            <a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}"
                               class="btn btn-sm btn-info float-right">
                                View Discussion
                            </a>
                        @endif
                    </div>
                @endforeach
            </ul>

        </div>
    </div>
@endsection
