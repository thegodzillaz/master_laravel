
@extends('dashboard_layouts.app')
@section('title', 'Dashboard')
@section('navbar')
    @parent

    {{-- <p>This is appended to the master sidebar.</p> --}}
@endsection

@section('content')
  <div class="content">
      <div class="title m-b-md">
            {{$data['name']}}
      </div>
      <div>Anda login sebagai Member <b>{{$data['rule']}}</b></div>
      <div class="links">
          <a href="{{url('login')}}">Login</a>
          <a href="{{url('register')}}">Register</a>
          <a href="{{url('admin')}}">Admin Page</a>
          <a href="{{url('logout')}}">Logout</a>
      </div>
  </div>
@endsection
