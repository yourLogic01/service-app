@extends('layouts.main')

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
        <p class="text-center fs-4">No Post found.</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>


@endsection