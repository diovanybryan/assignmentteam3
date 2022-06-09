@extends('templates.logintemplate')
@section('title','REGISTER PAGE - DIOVAPESTORE')
@section('form')
  <form class="modal-content animate" action="/register/add" method="post">
    @csrf
    <div class="imgcontainer">
      <h2>{{$title}}</h2>
      <h3>{{$description}}</h3>
    </div>

    <div class="container">
      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      <label><b>Nama</b></label>
      <input type="text" placeholder="Enter Nama" name="name" required>
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <button type="submit" style="background-color: #000000">Register</button>
      <a href="/login">Back to Login</a>
      <label>
      </label>
    </div>
    <div class="container" style="background-color:#f1f1f1">
    </div>
  </form>
@endsection