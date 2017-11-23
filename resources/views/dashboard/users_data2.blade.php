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


 .funkyradio div {

  }

  .funkyradio label {
    /*min-width: 400px;*/
    width: 100%;
    border-radius: 3px;
    border: 1px solid #D1D3D4;
    font-weight: normal;
}
.funkyradio input[type="radio"]:empty, .funkyradio input[type="checkbox"]:empty {
    display: none;
}
.funkyradio input[type="radio"]:empty ~ label, .funkyradio input[type="checkbox"]:empty ~ label {
    position: relative;
    line-height: 2.5em;
    text-indent: 3.25em;
    margin-top: 2em;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.funkyradio input[type="radio"]:empty ~ label:before, .funkyradio input[type="checkbox"]:empty ~ label:before {
    position: absolute;
    display: block;
    top: 0;
    bottom: 0;
    left: 0;
    content:'';
    width: 2.5em;
    background: #D1D3D4;
    border-radius: 3px 0 0 3px;
}
.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before, .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
    content:'\2714';
    text-indent: .9em;
    color: #C2C2C2;
}
.funkyradio input[type="radio"]:hover:not(:checked) ~ label, .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
    color: #888;
}
.funkyradio input[type="radio"]:checked ~ label:before, .funkyradio input[type="checkbox"]:checked ~ label:before {
    content:'\2714';
    text-indent: .9em;
    color: #333;
    background-color: #ccc;
}
.funkyradio input[type="radio"]:checked ~ label, .funkyradio input[type="checkbox"]:checked ~ label {
    color: #777;
}
.funkyradio input[type="radio"]:focus ~ label:before, .funkyradio input[type="checkbox"]:focus ~ label:before {
    box-shadow: 0 0 0 3px #999;
}
.funkyradio-default input[type="radio"]:checked ~ label:before, .funkyradio-default input[type="checkbox"]:checked ~ label:before {
    color: #333;
    background-color: #ccc;
}
.funkyradio-primary input[type="radio"]:checked ~ label:before, .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #337ab7;
}
.funkyradio-success input[type="radio"]:checked ~ label:before, .funkyradio-success input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #5cb85c;
}
.funkyradio-danger input[type="radio"]:checked ~ label:before, .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #d9534f;
}
.funkyradio-warning input[type="radio"]:checked ~ label:before, .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #f0ad4e;
}
.funkyradio-info input[type="radio"]:checked ~ label:before, .funkyradio-info input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #5bc0de;
}



table {
  border-collapse: separate;
  border-spacing: 0 5px;
}

thead th {
  background-color: #006DCC;
  color: white;
}

tbody td {
  background-color: #EEEEEE;
}

tr td:first-child,
tr th:first-child {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}

tr td:last-child,
tr th:last-child {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
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
      {{-- <div class="span16">
          <form id="custom-search-form" class="form-search form-horizontal pull-right">
              <div class="input-append span16">
                  <input type="text" class="search-query" placeholder="Search">
                  <button type="submit" class="btn"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </form>
      </div> --}}
  {{-- </div> --}}
  {{-- <div id="createForm">
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@else
  <div class="alert alert-success alert-dismissable fade in" hidden="true" id="div-alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <p id="alert-message">okehalh</p>
  </div>
@endif




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

                  <form id="form-add-user" action="user/create" method="post" class="form-signin">

                  <!-- <input type="hidden" name="_token" value=" --><!-- "> -->
                  {{-- <h4 class="form-signin-heading">Please register</h4> --}}

                  <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">
                          Username</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="username" placeholder="username" required autofocus/>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">
                          Name</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" name="name" placeholder="name" required autofocus/>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">
                          Email</label>
                      <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required autofocus/>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="password" class="col-sm-2 control-label">
                          Password</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="password" required autofocus/>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="password_cofirmation" class="col-sm-2 control-label">
                          Confirmation</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" required />
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="dropdown-user" class="col-sm-2 control-label">User Type</label>
                    <div class="dropdown col-sm-10" id="dropdown-user"  name="dropdown-user">
                      <button class="btn btn-primary dropdown-toggle form-control" type="button" data-toggle="dropdown" id="btn-user">User
                      <span class="caret"></span></button>
                      <ul id="drp_user"class="dropdown-menu">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">User</a></li>
                      </ul>
                    </div>
                  </div>
                  <input type="hidden" value="" id="user_type" name="user_type">



                  {{csrf_field()}}
                  {{-- <button class="btn btn-lg btn-primary btn-block user-create-ajax" type="submit">Add</button> --}}
                </form>

                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success user-create-ajax" data-dismiss="modal">Save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
  </div>

  <a href="#" data-toggle="modal" data-target="#modalMd"><i class="glyphicon glyphicon-plus"></i></a>



  <div id="loadData" hidden="true">
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

 <div id="loadData2">
   <table id='users-table'  width="100%">
    <thead style="background-color: #bdc3c7;">
      <tr>
        <th>Name</th>
        <th>Id</th>
        <th>email</th>
        <th>User Type</th>
        <th>Created</th>
        <th>setting</th>
      </tr>
    </thead>
    <tbody id='tbody'>
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
  $('#drp_user li').on('click', function(){
      $('#user_type').val($(this).text());
      $('#btn-user').html($(this).text());
  });



  $('#users-table').DataTable({
          "autoWidth": true,
          "scrollX": true,
          "processing": true,
          "serverSide": true,
          ajax:" {{url('/user/datatable')}}",
          columns: [
              { "data": "name"},
              { "data": "user_name"},
              { "data": "email"},
              { "data": "role_name"},
              { "data": function (data) {
                    return '<small>'+data.created+' </small>' +
                    '<small><span class="label label-success">'+
                    data.created_time+
                    '</span></small>';
                },"targets": [0], "searchable": false, "orderable": false, "visible": true
              },
              {"data": function (data){
                return ''+
                  '<div class="dropdown">'+
                    '<button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Setting '+
                    '<span class="caret"></span></button>'+
                    '<ul class="dropdown-menu">'+
                      '<li><a href="{{url('/user/show/')}}/'+data.id+'">Detail</a></li>'+
                      '<li><a href="{{url('/user/edit/')}}/'+data.id+'">Edit</a></li>'+
                      '<li><a href="{{url('/user/delete/')}}/'+data.id+'">Delete</a></li>'+
                    '</ul>'+
                  '</div>';
              },"targets": [0], "searchable": false, "orderable": false, "visible": true}
          ]
  });




  $.ajaxSetup({
    headers:{ 'X-CSRF-Token' :  $('meta[meta=_token]').attr('content')}
  });

  $('.user-create-ajax').click(function(){
    $.ajax({
      url     : "user/create",
      type    : "post",
      data    : {
          'username'  : $('input[name=username]').val(),
          'name'      : $('input[name=name]').val(),
          'email'     : $('input[name=email]').val(),
          'password'  : $('input[name=password]').val(),
          'user_type' : $('input[name=user_type]').val(),
          '_token'    : $('input[name=_token]').val()
      },
      success : function(data){
          // $("#asu").html(JSON.stringify(data.msg));
          // alert(JSON.stringify(data));
          $('#alert-message').html(data.message);
          $("#div-alert").fadeIn("slow");
          $('#users-table').DataTable().ajax.reload();

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
          document.getElementById('form-add-user').reset();
      },
      error   : function(error){
          console.log(error);
          alert(log(error));
      }

    });
  });
})
</script>
@endsection
