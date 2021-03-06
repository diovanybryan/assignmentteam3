@extends('templates.rent')
@section('kanan')
    @if ($status_login == true)
        <a href="/logout">
            Keluar
        </a>
    @endif

    @if ($status_login == false)
        <a href="/login">
            Masuk
        </a>
    @endif

    <a href="">
        <img src="images/cart.png" alt="">
    </a>
@endsection
@section('kiri')
            <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="/home">Beranda <span class="sr-only">(current)</span></a>
                </li>
                @if ($role == 'user' || $role == 'guest')
                <li class="nav-item">
                  <a class="nav-link" href="/katalog">Katalog</a>
                </li>
                @endif
                @if ($role == 'user')
                <li class="nav-item">
                  <a class="nav-link" href="/myorder">Pesanan Saya</a>
                </li>
                @endif
                @if ($role == 'manager')
                <li class="nav-item">
                  <a class="nav-link" href="/servicemanager">Management Service Mobil</a>
                </li>
                @endif
                @if ($role == 'admin')
                <li class="nav-item">
                  <a class="nav-link" href="/cars">Admin Management Mobil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/vendor">Admin Bengkel Vendor</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/serviceView">Admin Data Service</a>
                </li>
                @endif
              </ul>
            </div>
@endsection

@section('footer')
  <section class="container-fluid footer_section">
    <p>
      Assignment Tim 3 &copy; <span id="displayYear"></span> Training Laravel 2022
      <a href="https://html.design/">@Ibis Hotel Senen</a>
    </p>
  </section>
@endsection

@section('info')
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h6>
            Berlangganan Sekarang
          </h6>
          <form action="">
            <input type="text" placeholder="Masukkan alamat email anda">
            <div class="d-flex justify-content-end">
              <button>
                kirim
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-3 offset-md-1">
          <h6>
            Lokasi
          </h6>
          <ul>
            <li>
              <a href="">
                Jakarta, Indonesia
              </a>
            </li>
            <li>
              <a href="">
                Kuala Lumpur, Malaysia
              </a>
            </li>
            <li>
              <a href="">
                Bekasi, Indonesia
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Sosial Media
          </h6>
          <ul>
            <li>
              <a href="">
                Instagram
              </a>
            </li>
            <li>
              <a href="">
                Twitter
              </a>
            </li>
            <li>
              <a href="">
                Facebook
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('contact')
<!--   <section class="contact_section layout_padding">
    <div class="container">
      <h2>
        Hubungi Kami
      </h2>
      <div class="">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <form action="">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Name">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number">
                  </div>
                  <div>
                    <input type="email" placeholder="Email">
                  </div>
                  <div class="">
                    <input type="text" placeholder="Message" class="message_input">
                  </div>
                  <div class="mt-5 d-flex justify-content-center ">
                    <button type="submit">
                      Send
                    </button>
                  </div>
                </div>

              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section> -->
@endsection

@section('client')
<!--   <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span> Apa kata </span> mereka
        </h2>
      </div>
      <div class="box">
        <div class="detail-box">
          <p>
            Pelayanan keren, mobil harum, bintang 5 pokoknya
          </p>
        </div>
        <div class="client-id">
          <div class="img-box">
            <img src="images/client.png" alt="">
          </div>
          <h5>
            Ecce
          </h5>
        </div>
      </div>
    </div>
  </section> -->
@endsection

@section('buy')
<!--   <section class="buy_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span class="s-1">
            Buy
          </span>
          your stylish
          <span class="s-2">
            glasses
          </span>
        </h2>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="images/buy-img.png" alt="">
        </div>
        <div class="detail-box">
          <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
            letters, <br>
            It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
            letters,
          </p>
          <a href="">
            Book Now
          </a>
        </div>
      </div>
    </div>
  </section> -->
@endsection

@section('offer')
<!--   <section class="offer_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 px-0">
          <div class="img-box">
            <img src="images/offer-img.jpg" alt="">
            <div class="price">
              <h4>
                $60
              </h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 offset-md-1">
          <div class="detail-box">
            <h2>
              Promo <br>
              bulan <br>
              ini <br>
              nih
            </h2>
            <a href="">
              Selengkapnya
            </a>
          </div>
        </div>
      </div>
    </div>
  </section> -->
@endsection

@section('quality')
  <section class="quality_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span> Jangan</span> Ragu
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <ul class="nav nav-tabs detail-box" id="myTab" role="tablist">
            <li class="">
              <a class=" active" id="QTab1Link" data-toggle="tab" href="#qTab1" role="tab" aria-controls="qTab1" aria-selected="true">
                <h6 id="QTab1Link" data-toggle="tab" href="#qTab1" role="tab" aria-controls="qTab1" aria-selected="true">
                  <span>01</span>
                  Pelayanan cepat, kualitas kendaraan terbaik
                </h6>
              </a>
            </li>
            <li class="">
              <a class="" id="QTab2Link" data-toggle="tab" href="#qTab2" role="tab" aria-controls="qTab2" aria-selected="false">
                <h6 id="QTab2Link" data-toggle="tab" href="#qTab2" role="tab" aria-controls="qTab2" aria-selected="false">
                  <span>02</span>
                  Pemelihaan berkelanjutan, kuat menerjang jalanan
                </h6>
              </a>
            </li>
            <li class="">
              <a class="" id="QTab3Link" data-toggle="tab" href="#qTab3" role="tab" aria-controls="qTab3" aria-selected="false">
                <h6 id="QTab3Link" data-toggle="tab" href="#qTab3" role="tab" aria-controls="qTab3" aria-selected="false">
                  <span>03</span>
                  Harga terjangkau, kantong tidak galau
                </h6>
              </a>
            </li>
            <li class="">
              <a class="" id="QTab4Link" data-toggle="tab" href="#qTab4" role="tab" aria-controls="qTab4" aria-selected="false">
                <h6 id="QTab4Link" data-toggle="tab" href="#qTab4" role="tab" aria-controls="qTab4" aria-selected="false">
                  <span>04</span>
                  Banyak pilihan, gaya tetap andalan
                </h6>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-6 tab-content">
          <div class="img-container tab-pane  fade show active" id="qTab1" role="tabpanel" aria-labelledby="QTab1Link">
            <div class="img-box ">
              <img src="images/quality-img.jpg" alt="">
            </div>
          </div>
          <div class="img-container tab-pane fade" id="qTab2" role="tabpanel" aria-labelledby="QTab2Link">
            <div class="img-box  ">
              <img src="images/buy-img.png" alt="">
            </div>
          </div>
          <div class="img-container tab-pane fade" id="qTab3" role="tabpanel" aria-labelledby="QTab3Link">
            <div class="img-box  ">
              <img src="images/quality-img.jpg" alt="">
            </div>
          </div>
          <div class="img-container tab-pane fade" id="qTab4" role="tabpanel" aria-labelledby="QTab4Link">
            <div class="img-box  ">
              <img src="images/buy-img.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('slider')
    <section class=" slider_section position-relative">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">10</li> <span>-</span>
        <li data-target="#carouselExampleIndicators" data-slide-to="1">06</li> <span>-</span>
        <li data-target="#carouselExampleIndicators" data-slide-to="1">2022</li>
      </ol>
      <div class="glass">
        <h6>
          Gaderentcar - Tim 3
        </h6>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h2>
                        Gaderentcar
                      </h2>
                      <h3>
                        Solusi sewa mobil nomor 1
                      </h3>
                      @if ($role == 'manager')
                      <h2>
                        Manager View
                      </h2>
                      @endif
                      @if ($role == 'admin')
                      <h2>
                        Admin View
                      </h2>
                      @endif
                      @if ($role == 'user')
                      <div class="btn-box">
                        <a href="/katalog" class="btn-1">
                          Sewa Mobil Sekarang
                        </a>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('about')
  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                <span>Tentang</span> Kami
              </h2>
            </div>
            <p>
              Kami berdiri sejak tahun 2022 di bulan juni tanggal 9...
            </p>
            <a href="">
              Selengkapnya
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@if ($role == 'user' || $role == 'guest')
@section('glass')
  <section class="glass_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span> Produk </span> Kami
        </h2>
      </div>
      <div class="glass_container">
    @foreach ($list_product as $product)
        <div class="box">
          <div class="img-box">
            <img src="images/g-1.png" alt="">
          </div>
          <div class="price">
            <h6>
              {{$product->nama}}
            </h6>
          </div>
        </div>
    @endforeach
      </div>
      <div class="btn-box">
        <a href="/katalog">
          Selengkapnya
        </a>
      </div>
    </div>
  </section>
@endsection
@endif

@section('header')
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand mr-5" href="index.html">
            <span>
              GADERENTCAR
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @yield('kiri')
            <div class="quote_btn-container ">
              @yield('kanan')
            </div>
          </div>
        </nav>
      </div>
    </header>
@endsection