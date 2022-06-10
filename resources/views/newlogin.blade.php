@extends('templates.rent')
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
        </nav>
      </div>
    </header>
	<section class="contact_section layout_padding">
	    <div class="container">
	      <h2>
	        Form Login
	      </h2>
	      <div class="">
	        <div class="row">
	          <div class="col-md-6 mx-auto">
	            <form action="/login/auth" method="post">
	              @csrf
	              <div class="contact_form-container">
	                <div>
	                  <div>
	                    <input type="email" placeholder="Email" id="email" name="email">
	                  </div>
	                  <div class="">
	                    <input type="password" placeholder="Password" class="message_input" id="password" name="password">
	                  </div>
	                  <div class="mt-5 d-flex justify-content-center ">
	                    <button type="submit">
	                      Masuk
	                    </button>
	                  </div>
	                  <div class="mt-4 d-flex justify-content-center ">
	                  	<a href="/register">Daftar akun baru</a>
	                  </div>
	                  <div class="mt-3 d-flex justify-content-center ">
	                  	<a href="/home">Kembali ke Beranda</a>
	                  </div>
	                </div>

	              </div>

	            </form>
	          </div>
	        </div>
	      </div>
	    </div>
	</section>    
@endsection