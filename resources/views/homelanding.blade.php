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
    <form class="form-inline">
        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
    </form>
@endsection