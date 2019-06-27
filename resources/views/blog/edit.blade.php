@extends('layouts.app')


@section('content')

      <!-- Post Content Column -->
      <div class="container">

     <div class="row">
      <div class="col-lg-8">

        <h1>Edit a post</h1>

        	@include('partials.errors')


			<form class="form" action="/posts" method="post">



        	@csrf

        	@method('PUT')

        	<input type="hidden" name="id" id="id" value="{{ $post->id }}">

        	<div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}">

        	</div>

        	<div class="form-group">
                <label for="body">Body</label>
                <input type="textarea" name="body" id="body" class="form-control" value="{{ old('title', $post->body) }}">
        	</div>
            

            <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id">
                      <option class="form-control" value="">Select a category</option>
                      @foreach($cats as $key => $value)
                        <option value="{{ $key }}"
                         @if($key == old('category_id', $post->category_id))
                           selected
                         @endif
                        >{{ $value }}</option>
                      @endforeach
                    </select>
                     @if($errors->has('category_id'))
                    <span class="error text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
            </div>



            <div class="form-group">
                <label for="tags">Tags</label>
                    @foreach($tags as $key => $value)
                    @php
                        if(array_key_exists($key, $post->tags->toArray())){
                            $checked='checked';
                        }else{
                            $checked= '';
                        }
                    @endphp

                      <input type="checkbox" name='tags[]' value="{{ $key }}" {{ $checked }}/> 
                      &nbsp; {{ $value}} &nbsp;&nbsp;
                      
                    @endforeach

                    @if($errors->has('tags'))
                    <span class="error text-danger">{{ $errors->first('tags') }}</span>
                    @endif
                    <div>
                <button class="button" name="submit" type="submit">Submit</button>
            </form>
            </div>@include('partials.sidebar')

         


        	

        
        </div>
    </div>

@endsection