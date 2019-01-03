<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register-Music Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css">
      
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
            <li class="nav-item ">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="signup.php">Register<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
        </div>
      </nav>
      
      <div class="container" style="background:white; margin-top: 80px">
        <div class="row main-body">
            <div class="col-lg-8">
                    <h1 class="display-4">Register</h1>
                    <br/>
                <?php
                      include "includes/classes/user.php";
                      $user=new user();
                      $alert=new alert();

                      if(isset($_POST['register'])){
                        $user->setFullname($_POST['fullname']);
                        $user->setEmail($_POST['email']);
                        $user->setGender($_POST['gender']);
                        $user->setPassword($_POST['password']);

                        $user->register();
                      }
                 ?>
                 <form method="POST">
                   <div class="row">
                        <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" placeholder="Full name" name="fullname" required>
                                </div>
                                <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                        <select class="form-control" name="gender" id="gender"  required>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                                </div>
                                <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password" placeholder="Re-Enter Password" required>
                                        <span id='message'></span>
                                </div>
                        </div>
                        <div class="col-sm-6 col-md-6">

                        </div>
                   </div>
                   <div class="row"><button type="submit" class="btn btn-dark" name="register">Register</button></div>
                  </form>
         

            </div>
          </div>
      </div>

  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>  
  <script src="assets/js/main.js"></script> 
  <script>
      let main=new Main();
  $(document).ready(function(){
     main.checkPassword();
  })
  </script>
</body>
</html>