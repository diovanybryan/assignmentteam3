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
                  <a class="nav-link" href="/home">Beranda</a>
                </li>
<!--                 <li class="nav-item">
                  <a class="nav-link" href="about.html">Tentang </a>
                </li> -->
                <li class="nav-item active">
                  <a class="nav-link" href="/katalog">Katalog <span class="sr-only">(current)</span></a>
                </li>
<!--                 <li class="nav-item">
                  <a class="nav-link" href="glass.html">FAQ</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="/contactus">Hubungi Kami</a>
                </li>
                @if ($status_login == true)
                <li class="nav-item">
                  <a class="nav-link" href="/myorder">Pesanan Saya</a>
                </li>
                @endif
              </ul>
            </div>
@endsection

@section('header')
    <header class="header_section" style="background-color: #141414">
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

  <section class="contact_section layout_padding">
    <div class="container">
      <h2>
        Form Penyewaan Mobil
      </h2>
      <div class="">
        <div class="row" style="background-color: #544C4A">
          <div class="col-md-6 mx-auto" >
            <form action="/katalog/sewa/pesan/submit" method="post">
              @csrf
              <div class="contact_form-container">
                <div>
                  <div>
                    <p>Tanggal & Waktu Mulai :</p>
                    <input type="datetime-local" placeholder="Name" id="tgl_mulai" name="tgl_mulai">
                  </div>
                  <div>
                    <p>Tanggal & Waktu Selesai :</p>
                    <input type="datetime-local" placeholder="Name" id="tgl_akhir" name="tgl_akhir">
                  </div>
                  <div class="mt-3 d-flex justify-content-center ">
                    <input type="hidden" placeholder="id_user" id="id_user" name="id_user" value="{{Auth::user()->id}}">
                    <input type="hidden" placeholder="id_mobil" id="id_mobil" name="id_mobil" value={{$id}}>
                    <button type="submit">
                      Pesan Mobil
                    </button>
                  </div>
            </form>
                  <div class="mt-5 d-flex justify-content-center ">
                    <a href="/katalog">
                      Kembali ke Katalog
                    </a>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br style="background-color: #141414">
  <br style="background-color: #141414">
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
  <section class="container-fluid footer_section">
    <p>
      Assignment Tim 3 &copy; <span id="displayYear"></span> Training Laravel 2022
      <a href="https://html.design/">@Ibis Hotel Senen</a>
    </p>
  </section>
    </header>
@endsection