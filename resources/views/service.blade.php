@extends('templates.rent')
@section('kanan')
    @if ($status_login)
        <a href="/logout">
            Keluar
        </a>
    @else
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
                <li class="nav-item">
                  <a class="nav-link" href="/cars">Admin Management Mobil</a>
                </li>
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
    <!-- <div class="container"> -->
      <h2>
        {{$title}}
      </h2>
      <div class="">
        <div class="row">
          <div class="col-md-6 mx-auto">
              <div class="contact_form-container">
                <div>
                  @if($title == "DATA SERVICE MOBIL GADERENTCAR")
                  <table border = "1px" width="100%" class="table table-dark">
                    <tr align="center">
                      <th>Mobil</th>
                      <th>Nama</th>
                      <th>Kilometer</th>
                      <th>Bengkel</th>
                      <th>PIC</th>
                      <th>TGL Masuk</th>
                    </tr>
                    @foreach($tbl_riwayat as $r)
                    <tr>
                        @if($r->img)
                          <td align="center"><img src = "{{URL::to($r->img)}}" style="width: 165px;"/></td>
                        @endif
                        <td>{{$r->merk_mobil}}</td>
                        <td>{{$r->kilometer}}</td>
                        <td>{{$r->bengkel}}</td>
                        <td>{{$r->pic}}</td>
                        <td>{{$r->created_at}}</td>
                    </tr>
                    @endforeach
                  </table>
                  </br>
                <form method = "POST" action="/serviceMobil/vendor">
                @csrf
                    <div>
                      <label style="color:#878889"> Select Vendor </label>
                      <select name="id_vendor" class="form-control">
                        @foreach($tbl_vendor as $v)
                        <option value="{{$v->id}}">{{$v->nama}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div>
                      <input type="text" name = "id_mobil" placeholder="Nomor Polisi">
                    </div>
                    <div>
                      <input type="text" name = "create_by" placeholder="Nama Pemilik">
                    </div>
                    <div>
                      <input type="number" name = "kilometer" placeholder="Kilometer">
                    </div>
                    <div>
                      <label style="color:#878889"> Keluhan Kendaraan Anda </label>
                      <textarea name = "keluhan" placeholder="Keluhan Kendaraan Anda" class="form-control" style="height: 150px;"></textarea>
                    </div>
                    <div class="mt-5 d-flex justify-content-center ">
                      <button type="submit">
                        Save
                      </button>
                    </div>
                </form>
                @elseif($title == "SERVICE MOBIL GADERENTCAR")
                <form method = "POST" action="/serviceMobil/Service">
                @csrf
                    @foreach($tbl_mobil as $m)
                    <div align="center">
                      <img src = "{{URL::to($m->img)}}" style="width: 450px;"/>
                      </div>
                    </br>
                    <div>
                      <input type="text" name = "create_by" value="Naufal Eka Sulaeman" value="Auth::user()->name" readonly>
                    </div>
                    <div style="display:none;">
                      <input type="text" name = "id_mobil" value="{{$m->id}}" readonly>
                    </div>
                    <div>
                      <input type="text" name = "nama_kendaraan" value="{{$m->nama}}" readonly>
                    </div>
                    <div>
                      <input type="number" name = "kilometer" value="{{$m->kilometer}}" readonly>
                    </div>
                    @endforeach
                    <div>
                      <label style="color:#878889"> Select Vendor </label>
                      <select name="id_vendor" class="form-control">
                        @foreach($tbl_vendor as $v)
                        <option value="{{$v->id}}">{{$v->nama}}</option>
                        @endforeach
                      </select>
                    </div>
                    </br>
                    <div>
                      <label style="color:#878889"> Keluhan Kendaraan Anda </label>
                      <textarea name = "keluhan" placeholder="Keluhan Kendaraan Anda" class="form-control" style="height: 150px;"></textarea>
                    </div>
                    <div class="mt-5 d-flex justify-content-center ">
                      <button type="submit">
                        Daftar Service
                      </button>
                    </div>
                </form>
                @elseif($title == "INSERT VENDOR")
                  <table border = "1px" width="100%" class="table table-dark">
                    <tr align="center">
                      <th>Id</th>
                      <th>Nama Vendor Bengkel</th>
                    </tr>
                    @foreach($tbl_vendor as $v)
                    <tr align="center">
                        <td>{{$v->id}}</td>
                        <td>{{$v->nama}}</td>
                    </tr>
                    @endforeach
                  </table>
                  </br>
                  <form method = "POST" action="/insertVendor">
                  @csrf
                    <div>
                      <input type="text" name = "nama" placeholder="Nama Vendor">
                    </div>
                    <div class="mt-5 d-flex justify-content-center ">
                      <button type="submit">
                        Save
                      </button>
                    </div>
                  </form>
                @endif
                <div>
                @if($errors->any())
                  @foreach($errors->all() as $error)
                  {{$error}}
                  @endforeach
                @endif
                </div>
                </div>
              </div>
          </div>
        </div>
      <!-- </div> -->
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