<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login-Music Library</title>
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
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Register</a>
            </li>
           
          </ul>
        </div>
      </nav>
      
      <div class="container" style="background:white; margin-top: 80px">
        <div class="row">
            <div class="col-lg-4">
            
            </div>
            <div class="col-lg-4">
                    <h1 class="display-4">Login</h1>
                    <br/>

             <div class="row"> 
               <?php
               include "includes/classes/user.php";
               $user=new user();
               if(isset($_POST['login'])){
                $user->setEmail($_POST['email']);
                $user->setPassword($_POST['password']);   
                $user->login();
               }
               ?>   
                 <form method="POST">
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                  </form>
             </div>

            </div>
            <div class="col-lg-4">
              
              </div>
          </div>
      </div>

  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>  
</body>
</html>