<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/form_style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mjstyle.css') }}" rel="stylesheet">
        <script src="{{asset('js/app.js') }}"></script>
        <title>@yield('title')</title>
        @yield('head')
        <script type="text/javascript">
          function menuAktif() {
              var judul = document.getElementsByTagName('title')[0];
          }

        </script>


    </head>
    <body onload="menuAktif();">
        @section('navbar')  <!-- Bagian navigasi bar -->
              <nav class="navbar navbar-default grdbiru tools-fixed">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">MataramJaya</a>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li class="@yield('mnHome')"><a href={{"dashboard"}}>Home<span class="sr-only">(current)</span></a></li>
                      <li class="@yield('mnBarang')"><a href="user">User</a></li>
                      <li class="@yield('mnTransaksi')"><a href="{{asset('transaksi')}}">Set Foods</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle grdbiru" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Report <span class="caret"></span></a>
                        <ul class="dropdown-menu grdbiru">
                          <li><a href="{{asset('laporan/harian')}}">Harian</a></li>
                          <li><a href="{{asset('laporan/bulanan')}}">bulanan</a></li>
                          <li><a href="{{asset('laporan/tahunan')}}">Tahunan</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">Laporan Sekarang</a></li>
                          <li role="separator" class="divider"></li>
                        </ul>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      {{-- <li>
                        <a href="#"><span class="glyphicon glyphicon-log-in"></span>{{' '$data['name']}}</a>
                      </li> --}}
                      <li class="dropdown">
                        <a href="#" class="grdbiru dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          {{' '.$data['username'].'@'.$data['rule']}} <span class="caret"></span></a>
                        <ul class="dropdown-menu grdbiru">
                          <li><a href="{{asset('laporan/harian')}}">Profil</a></li>
                          <li><a href="{{asset('laporan/bulanan')}}">Setting</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a class="glyphicon glyphicon-log-out" href="logout">Logout</a></li>
                          <li role="separator" class="divider"></li>
                        </ul>
                      </li>
                    </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </nav>
            @show
            <div class="container well form-horizontal frame-content">
              @yield('content')  <!--Append on here -->
            </div>
            <div style="margin-bottom: 25px;">
            </div>
        @section('footbar')
            <div clase="halat-footer" style="height: 25px;"></div>>
            <div class="footer navbar-fixed-bottom grdbiru" style="
            font-size:larger;padding-top: 5px; color:floralwhite; width: 100%; height: 35px; text-align: center; ">
                <h8>TB.Mataram Jaya</h8>
            </div>
        @show
    </body>
</html>
