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
                <li class="nav-item">
                  <a class="nav-link" href="/home">Beranda </a>
                </li>
<!--                 <li class="nav-item">
                  <a class="nav-link" href="about.html">Tentang </a>
                </li> -->
                @if (Auth::user()->role == 'user')
                <li class="nav-item">
                  <a class="nav-link" href="/katalog">Katalog</a>
                </li>
                @endif
<!--                 <li class="nav-item">
                  <a class="nav-link" href="glass.html">FAQ</a>
                </li> -->
                @if (Auth::user()->role == 'user')
                <li class="nav-item">
                  <a class="nav-link" href="/contactus">Hubungi Kami</a>
                </li>
                @endif
                @if (Auth::user()->role == 'user')
                <li class="nav-item">
                  <a class="nav-link" href="/myorder">Pesanan Saya</a>
                </li>
                @endif
                @if (Auth::user()->role == 'manager')
                <li class="nav-item active">
                  <a class="nav-link" href="/service">Management Service Mobil <span class="sr-only">(current)</span></a>
                </li>
                @endif
                @if (Auth::user()->role == 'manager')
                <li class="nav-item">
                  <a class="nav-link" href="/service">Management Vendor Bengkel</a>
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
  <section class="glass_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span> Mobil </span> Tersedia
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
            <a href="/katalog/servis/{{ $product->id }}">
              Input Service
            </a>
          </div>
        </div>
    @endforeach
      </div>
    </div>
  </section>
    </header>
@endsection