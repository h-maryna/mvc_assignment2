@extends('layouts.app')


@section('content')

      <!-- Post Content Column -->
      <div class="container">
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{ $post->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{ $post->created_at->toDayDateTimeString() }}</p>

        <p><span>Posted in: <a href="/posts/category/{{ $post->category->name }}">{{ $post->category->name }}</a></span></p>

        <hr>

        <!-- Tags -->

        <p>Tags:
          @foreach($post->tags as $tag)
          <a href="/posts/tag/{{ $tag->name}}">{{ $tag->name }}</a>&nbsp;
          @endforeach
        </p>



        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        {!! $post->body !!}

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form class="form" action="/comments" method="post">

              @csrf


              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment --> 
        @foreach($post->comments as $comment)
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://gravatar.org/avatar/{{md5($comment->user->email)}}" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{ $comment->user->name }}</h5>

           

           {!! $comment->body !!}

           

          </div>
        </div>
        @endforeach
        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>

      </div>
    
  </div>
@endsection