<!-- Start Blog Section -->
<div class="blog-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6">
          <h2 class="section-title">Recent Blog</h2>
        </div>
        <div class="col-md-6 text-start text-md-end">
          <a href="{{ route('post') }}" class="more">View All Posts</a>
        </div>
      </div>

      @if ($posts->isEmpty())
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h4 class="h4-heading">No post yet <i class="bi bi-emoji-frown"></i></h4>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
      @else
        <div class="row">
        @foreach ($posts as $post)
        
          <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
            <div class="post-entry">
              <a href="{{ route('post.show', $post->slug) }}" class="post-thumbnail"><img src="{{ asset('storage/' . $post->thumbnail) }}" style="height: 300px; width: 100%" alt="Image" class="img-fluid" /></a>
              <div class="post-content-entry">
                <h3><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
                <div class="meta">
                  <span>by {{ $post->author->name }}</span> <span>on {{ $post->created_at->diffForHumans() }}</span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      
  
        {{-- <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
          <div class="post-entry">
            <a href="#" class="post-thumbnail"><img src="images/post-2.jpg" alt="Image" class="img-fluid" /></a>
            <div class="post-content-entry">
              <h3><a href="#">How To Keep Your Furniture Clean</a></h3>
              <div class="meta">
                <span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
              </div>
            </div>
          </div>
        </div>
  
        <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
          <div class="post-entry">
            <a href="#" class="post-thumbnail"><img src="images/post-3.jpg" alt="Image" class="img-fluid" /></a>
            <div class="post-content-entry">
              <h3><a href="#">Small Space Furniture Apartment Ideas</a></h3>
              <div class="meta">
                <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12, 2021</a></span>
              </div>
            </div>
          </div>
        </div> --}}
        </div>
      @endif
    </div>
  </div>
  <!-- End Blog Section -->