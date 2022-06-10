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
                  <a class="nav-link" href="/home">Beranda <span class="sr-only">(current)</span></a>
                </li>
                @if ($role == 'user' || $role == 'guest')
                <li class="nav-item">
                  <a class="nav-link" href="/katalog">Katalog</a>
                </li>
                @endif
                @if ($role == 'user' || $role == 'guest')
                <li class="nav-item">
                  <a class="nav-link" href="/contactus">Hubungi Kami</a>
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
                  @if($title == "DATA MOBIL GADERENTCAR")
                  <table border = "1px" width="100%" class="table table-dark">
                    <tr align="center">
                      <th>Nama</th>
                      <th>Kilometer</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                    @foreach($tbl_mobil as $m)
                    <tr>
                      <td>{{$m->nama}}</td>
                      <td>{{$m->kilometer}}</td>
                      <td align="center"><img src = "{{URL::to($m->img)}}" style="width: 165px;"/></td>
                      <td align="center">
                        <a href="/editMobil/{{$m->id}}"> Edit </a> </br> 
                        <a href="/delete/{{$m->id}}" onclick="return confirm('Are you sure Delete {{$m->nama}}?')"> Delete </a> </br>
                        <a href="/daftarService/{{$m->id}}/Service" onclick="return confirm('Are you sure Service {{$m->nama}}?')"> Service Kendaraan </a>
                    </td>
                    </tr>
                    @endforeach
                  </table>
                  </br>
                <form method = "POST" action="/insertMobil" enctype="multipart/form-data">
                @csrf
                    <div>
                      <input type="text" name = "nama_kendaraan" placeholder="Nama Kendaraan">
                    </div>
                    <div>
                      <input type="number" name = "kilometer" placeholder="Kilometer">
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name = "img" accept="image/png, image/gif, image/jpeg">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <!-- <div class="">
                      <input type="text" placeholder="Message" class="message_input">
                    </div> -->
                    <div class="mt-5 d-flex justify-content-center ">
                      <button type="submit">
                        Save
                      </button>
                    </div>
                </form>
                @else
                <form method = "POST" action="/edit" enctype="multipart/form-data">
                @csrf
                  @foreach($tbl_mobil as $m)
                    <div style="display: none;">
                      <input type="text" name = "id" placeholder="id" value="{{$m->id}}">
                    </div>
                    <div>
                      <input type="text" name = "nama_kendaraan" placeholder="Nama Kendaraan" value="{{$m->nama}}">
                    </div>
                    <div>
                      <input type="number" name = "kilometer" placeholder="Kilometer" value="{{$m->kilometer}}">
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name = "img" accept="image/png, image/gif, image/jpeg">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @endforeach
                    <div class="mt-5 d-flex justify-content-center ">
                      <button type="submit">
                        Update
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