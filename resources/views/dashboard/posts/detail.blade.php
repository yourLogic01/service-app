@extends('dashboard.layouts.main')
@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <a href="{{ route('admin.postIndex') }}" class="btn btn-success btn-sm"><i
                            class="bi bi-arrow-left-circle"></i> Back</a>
                    <a href="{{ route('admin.postEdit', $post->id) }}" class="btn btn-warning btn-sm"><i
                            class="fa fa-edit"></i> Edit</a>
                    <div class="thumbnail py-3">
                        <img class="img-fluid" style="max-height: 350px; overflow:hidden;"
                            src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                    </div>
                    <div class="info text-muted pt-3">
                        <p>by {{ $post->author->name }}</p>
                    </div>
                    <div class="card-text py-2">
                        {!! $post->body !!}
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3>Comments</h3>
                            <hr>
                            @forelse ($comments as $comment)
                            <div class="card mb-2">
                                <div class="card-body">
                                <h6 class="card-title">{{ $comment->author->name }}</h6>
                                <p class="card-text">{{ $comment->body }}</p>
                                <small class="text-body-secondary">{{ $comment->created_at->diffForHumans() }} </small>
                                </div>
                            </div>
                        @empty
                            <p class="text-center fs-4">This post doesnt have comment.</p>
                        @endforelse
                              
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
