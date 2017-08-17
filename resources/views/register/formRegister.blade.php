
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap </title>

    <!-- Bootstrap core CSS -->

    <!-- <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    Cutom styles for this template
    <link href="signin.css" rel="stylesheet"> -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('js/bootstrap.js') }}" rel="script">
  </head>

  <body>

    <div class="container">

      <form action="{{url('register/create')}}" method="post" class="form-signin">

        <!-- <input type="hidden" name="_token" value=" --><!-- "> -->
        <h2 class="form-signin-heading">Please register</h2>

        <label for="usename" class="sr-only">User Name</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="User Name" required autofocus>

        <label for="name" class="sr-only">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus>

        <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>

        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

        <label for="password2" class="sr-only">Password</label>
        <input type="password" id="password2" name="password2" class="form-control" placeholder="Password Veryvication" required>

        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        {{csrf_field()}}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        <div style="text-align: center;">
            <p>Or</p>
            <label>
                <a href="{{url('login')}}">Sign In</a>
            </label>
        </div>
      </form>

    </div>
        <!-- <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
  </body>
</html>
