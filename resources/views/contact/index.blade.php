<!-- Contact -->
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
  <!-- end of contact -->