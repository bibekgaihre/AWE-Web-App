<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Music Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css">
    <script src="main.js"></script>   
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark " style="background:#492583">
        <a class="navbar-brand" href="#">Music Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active" >
              <a class="nav-link" href="index.php" id="home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="login.php" id="login">Login</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="signup.php" id="register">Register</a>
            </li>
          
          </ul>
        </div>
      </nav>
      <div class="vertical-center">
      <div class="container" style="background:white; margin-top: 80px">
        <div class="row">
            <div class="col">
              Welcome to the Music Library
            </div>
            <div class="col">
              You will need to register and login to see the list of available musics
              <Strong><span id="admin" style="cursor:pointer">Admin Login</span></Strong>
            </div>
          </div>
      </div>
    </div>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#home").click(function(){
        window.location='index.php'
      })
      $("#login").click(function(){
        window.location='login.php'
      })
      $("#admin").click(function(){
        window.location='adminlogin.php'
      })
    })
  </script>  
</body>
</html>
