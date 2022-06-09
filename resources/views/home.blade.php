@extends('templates.store')
@section('title','HOME')
@section('header')
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">WELCOME {{ $name }}</h1>
                    <!-- <p class="lead fw-normal text-white-50 mb-0">Berhenti Merokok - Mending Beli KOPI</p> -->
                </div>
            </div>
@endsection
@section('content')
    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/kategori') }}">Categories</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/contactme') }}">Contact Us</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/cart') }}">Cart</a></li>
@endsection

@section('footer')
    <div class="container"><p class="m-0 text-center text-white">{{ $role }} MODE - TRAINING LARAVEL &copy;IBIS HOTEL 2022</p></div>
@endsection