@extends('templates.logintemplate')
@section('title','REGISTER PAGE - DIOVAPESTORE')
@section('form')
  <form class="modal-content animate" action="/login/auth" method="post">
    @csrf
    <div class="imgcontainer">
      <h2>{{$title}}</h2>
      <h3>{{$description}}</h3>
    </div>
    <div class="container">
      {{session('errors')}}
      {{session('success')}}
      <br>
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <button type="submit" style="background-color: #000000">Login</button>
      <a href="/register">Sign Up</a>
      <label>
      </label>
    </div>
    <div class="container" style="background-color:#f1f1f1">
    </div>
  </form>
@endsection