
{{-- <!-- Contact -->
<div id="contact" class="form-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading">Contact Us</h2>
                <h5 class="h5-heading">Ada yang ditanyakan tentang jasa kami? anda bisa datang ke tempat kami atau hubungi kami di :</h5>
                <ul class="list-unstyled li-space-lg">
                    <li><i class="fas fa-map-marker-alt"></i> &nbsp;<a href="{{ $data->gmaps_url }}">{{ $data->address }}</a></li>
                    <li><i class="fas fa-phone"></i> &nbsp;<a href="tel:{{ $data->phone }}">{{ $data->phone }}</a></li>
                    <li><i class="fas fa-envelope"></i> &nbsp;<a
                            href="mailto:{{ $data->email }}">{{ $data->email }}</a>
                    </li>
                </ul>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
  </div> <!-- end of form-1 -->
  <!-- end of contact --> --}}

<!-- Start Footer Section -->
<footer class="footer-section">
    <div class="container relative">
      <div class="row g-4 mb-3">
        <div class="col-lg-4">
          <div class="mb-4 footer-logo-wrap">
            <a href="#" class="footer-logo">Service-App<span>.</span></a>
          </div>
          <p class="mb-4">Sebuah usaha yang berjalan dibidang jasa. Khususnya perbaikan alat elektronik rumah tangga yang sudah rusak agar tidak menjadi limbah elektronik yang sia-sia.</p>

          <ul class="list-unstyled custom-social">
            <li>
              <a href="{{ $data->facebook_url }}" target="_blank"><span class="fa fa-brands fa-facebook-f"></span></a>
            </li>
            <li>
              <a href="{{ $data->instagram_url }}" target="_blank"><span class="fa fa-brands fa-instagram"></span></a>
            </li>
            <li>
              <a href="{{ $data->gmaps_url }}" target="_blank"><span class="fa fa-map" ></span></a>
            </li>
            <li>
              <a href="{{ $data->whatsapp_url }}" target="_blank"><span class="fa fa-brands fa-whatsapp" ></span></a>
            </li>
          </ul>
        </div>

        {{-- <div class="col-lg-8">
          <div class="row links-wrap">
            <div class="col-6 col-sm-6 col-md-3">
              <ul class="list-unstyled">
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
              </ul>
            </div>

            <div class="col-6 col-sm-6 col-md-3">
              <ul class="list-unstyled">
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact us</a></li>
              </ul>
            </div>

            <div class="col-6 col-sm-6 col-md-3">
              <ul class="list-unstyled">
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Our team</a></li>
              </ul>
            </div>

            <div class="col-6 col-sm-6 col-md-3">
              <ul class="list-unstyled">
                <li><a href="#">Leadership</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>

          </div>
        </div> --}}
      </div>

      <div class="border-top copyright">
        <div class="row pt-4">
          <div class="col-lg-6">
            <p class="mb-1 text-center text-lg-start">
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              . All Rights Reserved. &mdash; Designed with love by Developer</a>
            </p>
          </div>

          {{-- <div class="col-lg-6 text-center text-lg-end">
            <ul class="list-unstyled d-inline-flex ms-auto">
              <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div> --}}
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer Section -->