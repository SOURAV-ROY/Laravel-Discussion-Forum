@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center font-weight-bold">Add Discussion</div>

        <div class="card-body">
            {{--****************************************ERROR MESSAGE****************************************--}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{--************************************* END ERROR MESSAGE****************************************--}}
            <form action="{{route('discussions.store')}} " method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="">
                </div>

                <div class="form-group">
                    <label for="detail">Content</label>
                    <input id="detail" type="hidden" name="detail">
                    <trix-editor input="detail"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="channel">Channel</label>
                    <select name="channel" id="channel" class="form-control">
                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}">
                                {{$channel->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Create Discussion</button>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
