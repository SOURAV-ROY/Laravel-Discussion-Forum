@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
    </div>
    <div class="card">
        <div class="card-header text-center font-weight-bold">Add Discussion</div>

        <div class="card-body">

            <form action="{{route('discussion.store')}} " method="POST">
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
