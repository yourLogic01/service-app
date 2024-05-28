@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="{{ route('admin.postUpdate', $post->id) }}" class="mb-5" enctype="multipart/form-data">
      @method('put')  
      @csrf
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name=title required autofocus value="{{ old('title',$post->title)  }}"> 
          @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" readonly name=slug required value="{{ old('slug',$post->slug) }}">
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-control-label">Thumbnail<span class="text-danger"> *</span>
          </label>
          <!-- Image preview -->
          <div class="preview py-3 text-center">
              <img id="thumbnail-preview" src="{{ asset('storage/' . $post->thumbnail) }}"
                  alt="Current Thumbnail" style="width: 400px;">
          </div>
          <input class="form-control" type="file" name="thumbnail" id="thumbnail"
              onchange="previewThumbnail(this)">
          @error('thumbnail')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body',$post->body) }}">
          <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/admin/post/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  })

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  // Image preview
  function previewThumbnail(input) {
            var preview = document.getElementById('thumbnail-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection