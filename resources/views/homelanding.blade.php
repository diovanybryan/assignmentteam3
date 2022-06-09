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
                  <a class="nav-link" href="index.html">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">Tentang </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.html">Katalog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="glass.html">FAQ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Hubungi Kami</a>
                </li>
                @if ($status_login == true)
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Pesanan Saya</a>
                </li>
                @endif
              </ul>
            </div>
    <form class="form-inline">
        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
    </form>
@endsection