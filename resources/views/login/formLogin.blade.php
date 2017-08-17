
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

      <form action="{{url('login/post')}}" method="post" class="form-signin">
        <h2 class="form-signin-heading">User Member</h2>

        <label for="emailUserName" class="sr-only">Email address</label>
        <input type="input" name="emailUserName" class="form-control" placeholder="Email address" required autofocus>

        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>

        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        {{csrf_field()}}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <div style="text-align: center;">
            <p>Or</p>
            <label>
                <a href="{{url('register')}}">Register</a>
            </label>
            </div>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
