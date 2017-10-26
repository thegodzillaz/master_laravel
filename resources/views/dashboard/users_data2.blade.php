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
  {{-- <div id="createForm" hidden="true">
    <form action="user/create" method="post" class="form-signin">

    <!-- <input type="hidden" name="_token" value=" --><!-- "> -->
    <h2 class="form-signin-heading">Please register</h2>

    <label for="username" class="sr-only">User Name</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="User Name" required autofocus value="enyong">

    <label for="name" class="sr-only">Name</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus value="nyong">

    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus value="enyong@wangi">

    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required value="12345">

    <label for="password_confirmation" class="sr-only">Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Password Veryvication" required value="12345">

    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>

    {{csrf_field()}}
    <button class="btn btn-lg btn-primary btn-block user-create-ajax" type="submit">Add</button>
  </form>
  </div> --}}





{{-- sd f--}}


  <div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalMdTitle">Tambah User</h4>
            </div>
            <div class="modal-body">
                <div class="modalError"></div>
                <div id="modalMdContent">

                  <form action="user/create" method="post" class="form-signin">

                  <!-- <input type="hidden" name="_token" value=" --><!-- "> -->
                  <h4 class="form-signin-heading">Please register</h4>

                  <label for="username" class="sr-only">User Name</label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="User Name" required autofocus value="enyong">

                  <label for="name" class="sr-only">Name</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus value="nyong">

                  <label for="email" class="sr-only">Email address</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus value="enyong@wangi">

                  <label for="password" class="sr-only">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required value="12345">

                  <label for="password_confirmation" class="sr-only">Password</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Password Veryvication" required value="12345">


                  {{csrf_field()}}
                  {{-- <button class="btn btn-lg btn-primary btn-block user-create-ajax" type="submit">Add</button> --}}
                </form>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning user-create-ajax" data-dismiss="modal">Add By Ajax</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
  </div>

  <a href="#" data-toggle="modal" data-target="#modalMd"><i class="glyphicon glyphicon-plus"></i></a>



  <div id="loadData">
    <table class="table table-fixed table-hover" id='example'>
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
     <tbody id='tbody'>
        @foreach ($userData as $datas)
        <tr id="{{$datas->id}}">
         <td>{{++$no}}</td>
         <td>{{$datas->name}}</td>
         <td>{{$datas->username}}</td>
         <td>{{$datas->email}}</td>
         <td>{{$datas->role->namaRule}}</td>
         <td>
           <a href="#" style=""><span class="glyphicon glyphicon-info-sign"></span></a>
           <a href="#" style="color:orange;"><span class="glyphicon glyphicon-edit"></span></a>
           <a href="user/delete/{{$datas->id}}" style="color:red;"><span class="glyphicon glyphicon-trash"></span></a>
         </td>
        </tr>
        @endforeach
     </tbody>
   </table>
 </div>

    {{-- <ul>
    @foreach ($userData as $datas)
      <li>{{$datas->name}} @ {{$datas->role->namaRule}}</li>
    @endforeach
    <ul> --}}
<script>
$(document).ready(function(){
  $.ajaxSetup({
    headers:{ 'X-CSRF-Token' :  $('meta[meta=_token]').attr('content')}
  });
  $('.user-create-ajax').click(function(){

    $.ajax({
      url     : "user/create",
      type    : "post",
      data    : {
          'username': $('input[name=username]').val(),
          'name'    : $('input[name=name]').val(),
          'email'   : $('input[name=email]').val(),
          'password': $('input[name=password]').val(),
          '_token'  : $('input[name=_token]').val()
      },
      success : function(data){
          // $("#asu").html(JSON.stringify(data.msg));
          // alert(JSON.stringify(data));
          $('#example > tbody:last-child').append(
            '<tr id="'+data.id+'">'+
                '<td>{{$no=$no+1}}</td>'+
                '<td>'+data.name+'</td>'+
                '<td>'+data.username+'</td>'+
                '<td>'+data.email+'</td>'+
                '<td>'+data.roles+'</td>'+
                '<td>'+
                  '<a href="#"><span class="glyphicon glyphicon-info-sign"></span></a>'+
                  '<a href="#" style="color:orange;"><span class="glyphicon glyphicon-edit"></span></a>'+
                  '<a href="user/delete/'+data.id+'" style="color:red;"><span class="glyphicon glyphicon-trash"></span></a>'+
                '</td>'+
            '</tr>'
          );
      },
      error   : function(error){
          console.log(error);
      }

    });
  });
})
</script>
@endsection
