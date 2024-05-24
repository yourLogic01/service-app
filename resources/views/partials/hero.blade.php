{{-- <!-- Start Hero Section -->
<div class="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-md-9">
          <div class="intro-excerpt">
            <h1>Punya Barang Rusak?</h1>
            <p class="mb-4 fs-5">Jangan hawatir, disini anda bisa memesan jasa kami untuk memperbaiki alat elektronik anda yang rusak.</p>
            <p><a href="" class="btn btn-secondary me-2">Order Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hero-img-wrap">
             <img src="images/couch.png" class="img-fluid" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Hero Section --> --}}
<!-- Assuming you have a variable $currentPage that indicates the current page -->
@if ($currentPage === 'home')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="intro-excerpt">
                        <h1>Punya Barang Rusak?</h1>
                        <p class="mb-4">Jangan hawatir, disini anda bisa menghubungi jasa kami untuk memperbaiki barang alat elektronik anda yang rusak dan tidak terpakai.</p>
                        <p><a href="{{ route('order') }}" class="btn btn-secondary me-2">Order Now</a><a href="#explore" class="btn btn-white-outline">Explore</a></p>
                    </div>
                </div>
                {{-- <div class="col-md-7">
                    <div class="hero-img-wrap">
                        <img style="height: 400px" src="images/barang.png" class="img-fluid" />
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
@else
    <!-- Start Hero Section for Shop -->
    <div class="hero" style="display: none">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h2>hero title</h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <!-- Additional content specific to the shop page -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section for Shop -->
@endif


