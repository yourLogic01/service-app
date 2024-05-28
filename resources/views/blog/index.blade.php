@extends('layouts.sub')

@section('container')

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <button class="btn btn-primary btn-search" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>

@if ($posts->count())
        <div class="card mb-3">
            
            <div class="card-body text-center">
            <div style="height: 250px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->thumbnail) }}" alt="{{ $posts[0]->title }}" class="img-fluid">
            </div>
            <h3 class="card-title"><a class="text-decoration-none text-dark" href="/post/detail/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
            <p>
                <small class="text-body-secondary">
                    By. {{ $posts[0]->author->name }} {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>

            <a class="text-decoration-none btn btn-primary" href="/post/detail/{{ $posts[0]->slug }}">Read more</a>
            </div>
        </div>
    

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="img-fluid" style="height: 350px; width: 100%">
                        <h5 class="card-title"><a class="text-decoration-none text-dark" href="/post/detail/{{ $post->slug }}">{{ $post->title }}</a></h5>
                        <p>
                            <small class="text-body-secondary">
                                By. {{ $post->author->name }} {{ $post->created_at->diffForHumans() }} 
                            </small>
                        </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/post/detail/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4 py-5">No Post found.</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>


@endsection