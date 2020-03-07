@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold">All Notifications</div>

        <div class="card-body">

            <ul class="list-group">
                @foreach($notifications as $notification)
                    <li class="list-group-item">
                        @if($notification->type === 'LaravelForum\Notifications\NewReplyAdded')

                            Reply Added To <strong class="text-success">{{$notification->data['discussion']['title']}}</strong>

                            <a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}"
                               class="btn btn-sm btn-info float-right">
                                View Discussion
                            </a>
                        @endif

                        @if($notification->type === 'LaravelForum\Notifications\MarkAsBestReplyNotification')

                            Your Reply To <strong class="text-danger">{{$notification->data['discussion']['title']}}</strong>
                            Mark As Best Reply
                            <a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}"
                               class="btn btn-sm btn-info float-right">
                                View Discussion
                            </a>
                        @endif

                    </li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection
