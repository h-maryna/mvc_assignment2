@extends('layouts.app')


@section('content')

<!-- Blog Entries Column -->
    <div class="container">

      <div class="row">
        
      <div class="col-lg-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>
        @foreach($posts as $post)

        <!-- Blog Post -->
        <div class="card mb-4">
          <div class="card-body">
            <h2 class="card-title">{{ $post->title}}</h2>
            <p><span>Posted in: 
                <a href="/posts/category/{{ $post->category->name }}">
                  {{ $post->category->name }}</a>
                </span></p>

            @if(count($post->tags))
            <p style="text-decoration: underline;">Tags:</p>
              @foreach($post->tags as $tag)
                   <a href="/posts/tag/{{ $tag->name }}">{{ $tag->name}} </a>
                 &nbsp;
              @endforeach
           </p>
           @endif
            
            
            @if(Auth::check())
            <a class="btn btn-warning" href="/posts/edit/{{ $post->slug}}">edit</a><br />
            &nbsp;&nbsp;

            <form class="form form-inline" action="/posts/{{$post->slug}}" method="post">

              @csrf
              @method('DELETE')

              <button class="form-inline btn btn-sm btn-danger">delete</button>
            </form>&nbsp;&nbsp;<br />

            @endif

            
            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on {{ $post->created_at->diffForHumans() }} by
            <a href="#">{{ $post->user->name}}</a>
          </div>
        </div>
    
        @endforeach

        <!-- Pagination -->
        {!! $posts->links() !!}

      </div>

      @include('partials.sidebar')

    </div>
  </div>
@endsection