@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="{{ route('admin.postStore') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name=title required autofocus value="{{ old('title') }}"> 
          @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" readonly id="slug" name=slug required value="{{ old('slug') }}">
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
                <label class="form-label" for="thumbnail">Thumbnail<span class="text-danger"> *</span>
                </label>
                <img class="thumbnail-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" name="thumbnail" id="thumbnail" onchange="previewThumbnail()">
                @error('thumbnail')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
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

  function previewThumbnail() {
    const thumbnail = document.querySelector('#thumbnail');
    const thumbnailPreview = document.querySelector('.thumbnail-preview');

    thumbnailPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(thumbnail.files[0]);

    oFReader.onload = function(oFREvent) {
      thumbnailPreview.src = oFREvent.target.result;
    }
}


</script>
@endsection