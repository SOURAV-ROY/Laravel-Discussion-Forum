<div class="card-header text-center font-weight-bolder">

    <img src="{{Gravatar::src($discussion->author->email)}}"
         class="float-left"
         style="width: 30px; height: 30px; border-radius: 30%"
         alt="{{$discussion->author->name}}"
    >
    <strong class="text-success float-left mt-1 ml-1">{{$discussion->author->name}}</strong>

    <a href="{{route('discussions.show', $discussion->slug)}}"
       style="text-decoration: none;">
        <button class="btn btn-sm btn-primary float-right">View</button>
    </a>

</div>
