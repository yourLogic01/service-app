@extends('layouts.main')

@section('container')
    {{-- <section id="company-services" class="padding-large py-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
                <i class="bi bi-geo-alt icon-service"></i>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">Onsite Repair</h3>
              <p>Teknisi akan datang ke tempat anda dan memperbaiki di tempat.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
                <i class="bi bi-award icon-service"></i>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">Quality guarantee</h3>
              <p>Sudah pasti pengerjaan yang dilakukan teknisi terjaga dan efektif.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
                <i class="bi bi-tag icon-service"></i>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">Flexible Pricing</h3>
              <p>Harga dari biaya perbaikan yang fleksibel, tergantung dari kerusakan.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
                <i class="bi bi-shield-fill-plus icon-service"></i>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">100% secure payment</h3>
              <p>Pembayaran aman dan bergaransi.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
    <!-- Services Section -->
    <div id="explore" class="we-help-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-3 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1"><img src="images/kulkas.jpg" alt="Kulkas" /></div>
                        <div class="grid grid-2"><img src="images/jetpump.png" alt="Jet Pump" /></div>
                        <div class="grid grid-3"><img src="images/mesincuci.png" alt="Mesin Cuci" /></div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">Services</h2>
                    <p class="fs-6">
                        Kami menyediakan layanan perbaikan untuk berbagai jenis alat elektronik. Dengan tim teknisi yang
                        berpengalaman dan terlatih, kami memastikan setiap perbaikan dilakukan dengan teliti dan
                        profesional, menggunakan suku cadang berkualitas tinggi untuk menjamin performa optimal. Berikut
                        daftar contoh jasa perbaikan yang kami tawarkan:
                    </p>

                    <ul class="list-unstyled custom-list my-4">
                        <li>Mesin Cuci</li>
                        <li>Dispenser</li>
                        <li>Blender</li>
                        <li>Mesin Jahit</li>
                        <li>Rice Cooker</li>
                        <li>Jet Pump</li>
                        <li>Kompor Gas</li>
                        <li>Kipas Angin</li>
                        <li>Dan Lain Lain</li>
                    </ul>
                    <p class="fs-5">Butuh bantuan dan tertarik menggunakan jasa kami? </p><a href="{{ route('order') }}"
                        class="btn btn-dark">Order Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Section -->

    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section py-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">Why Choose Us</h2>
                    <p>Kami menyediakan layanan perbaikan untuk berbagai jenis alat elektronik, selain itu kami juga
                        menawarkan pelayanan yang terbaik serta harga yang terjangkau.</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6 mb-4">
                            <div class="feature mb-2">
                                <h3><i class="bi bi-geo-alt icon-service"></i> Onsite Repair</h3>
                                <p>Kami akan datang ke tempat anda dan memperbaiki di tempat. Sehingga anda dapat
                                    mengontroll dan melihatnya secara langsung proses dari perbaikanya.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 mb-4">
                            <div class="feature mb-2">
                                <h3><i class="bi bi-award icon-service"></i> Quality Guarantee</h3>
                                <p>Kami menjamin setiap perbaikan dilakukan dengan teliti dan profesional. sehingga kualitas
                                    dari perbaikan yang dilakukan terjamin dan terjaga.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature mb-2">
                                <h3><i class="bi bi-tag icon-service"></i> Flexible Pricing</h3>
                                <p>Harga dari biaya perbaikan yang fleksibel, tergantung dari kerusakan dari barang yang
                                    diperbaiki.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature mb-2">
                                <h3><i class="bi bi-shield-fill-plus icon-service"></i> Secured Payment</h3>
                                <p>Pembayaran aman dan bergaransi. Kami juga menjamin pembayaran anda.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid rounded-4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->
@endsection
