@extends('layouts.app')


@section('content')

      <!-- Post Content Column -->
      <div class="container">

        <div class="row">
      <div class="col-lg-8">

       

        <h1>Add a new post</h1>

        	@include('partials.errors')


			<form class="form" action="/posts" method="post">

		
			
        	@csrf


        	<div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                @if($errors->has('title'))
                <span class=" error text-danger">{{ $errors->first('title')}}</span>
                @endif
        	</div>

          

        	<div class="form-group">
                <label for="body">Body</label>
                <input type="textarea" name="body" id="body" class="form-control" value="{{ old('body') }}">
                @if($errors->has('body'))
                <span class=" error text-danger">{{ $errors->first('body')}}</span>
                @endif
        	</div>

             <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id">
                    <option value="">Select a category</option>
                    @foreach($cats as $key =>$value)

                    

                    <option value="{{ $key }}" @if($key == old('category_id'))
                    selected
                    @endif
                    >{{$value }}</option>
                    @endforeach
                    
                </select><br />
                
                @if($errors->has('category_id'))
                <span class=" error text-danger">{{ $errors->first('category_id')}}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="tags">Tags</label>
                @foreach($tags as $key => $value)
                <input type="checkbox" name="tags[]" value="{{ }}" />&nbsp; {{ $value }}&nbsp;
                @endforeach
            </div>
            
        	<div class="form-group">
                <button class="button" name="submit" type="submit">Submit</button>

            </form>
        	</div>

        @include('partials.sidebar')

        </div>
    </div>

@endsection