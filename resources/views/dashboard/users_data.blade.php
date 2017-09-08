@extends('dashboard_layouts.app')
@section('title', 'User Data')
@section('head')
  <style>
  #custom-search-form {
    margin:0;
    margin-top: 5px;
    padding: 0;
  }

  #custom-search-form .search-query {
      padding-right: 3px;
      padding-right: 4px \9;
      padding-left: 3px;
      padding-left: 4px \9;
      /* IE7-8 doesn't have border-radius, so don't indent the padding */

      margin-bottom: 0;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
  }

  #custom-search-form button {
      border: 0;
      background: none;
      /** belows styles are working good */
      padding: 2px 5px;
      margin-top: 2px;
      position: relative;
      left: -28px;
      /* IE7-8 doesn't have border-radius, so don't indent the padding */
      margin-bottom: 0;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
  }

  .search-query:focus + button {
      z-index: 3;
  }

  </style>
@endsection
@section('navbar')
    @parent  {{-- <p>This is appended to the master sidebar.</p> --}}
@endsection

@section('content')
  @php
    $no=0;
  @endphp
  {{-- <div class="row"> --}}
      <div class="span16">
          <form id="custom-search-form" class="form-search form-horizontal pull-right">
              <div class="input-append span16">
                  <input type="text" class="search-query" placeholder="Search">
                  <button type="submit" class="btn"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </form>
      </div>
  {{-- </div> --}}
  <table class="table table-fixed table-hover">
   <thead style="background-color: #bdc3c7;">
     <tr>
       <th>no</th>
       <th>Name</th>
       <th>Id</th>
       <th>email</th>
       <th>User Type</th>
       <th><span class="glyphicon glyphicon-cog"></span></th>
     </tr>
   </thead>
   <tbody>
      @foreach ($userData as $datas)
        @php
          $id=$datas->id;
        @endphp
      <tr style="">
       <td>{{++$no}}</td>
       <td>{{$datas->name}}</td>
       <td>{{$datas->username}}</td>
       <td>{{$datas->email}}</td>
       <td>{{$datas->role->namaRule}}</td>
       <td>
         <a href="#" style=""><span class="glyphicon glyphicon-info-sign"></span></a>
         <a href="#" style="color:orange;"><span class="glyphicon glyphicon-edit"></span></a>
         <a href="user/delete/{{$id}}" style="color:red;"><span class="glyphicon glyphicon-trash"></span></a>
       </td>

      </tr>
      @endforeach
     </tr>
   </tbody>
 </table>
    {{-- <ul>
    @foreach ($userData as $datas)
      <li>{{$datas->name}} @ {{$datas->role->namaRule}}</li>
    @endforeach
    <ul> --}}
@endsection
