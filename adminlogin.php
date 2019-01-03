<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login-Music Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css">
    <script src="main.js"></script>   
</head>
<body>
    
      
      <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <?php 
              include "includes/classes/admin.php";
              $admin=new admin();
              if(isset($_POST['login'])){
                $admin->setUsername($_POST['username']);
                $admin->setPassword($_POST['password']);
                $admin->adminLogin();
              }
            ?>
            <div class="col-lg-4">
                    <h1 class="display-4">Login</h1>
                    <br/>
             <div class="row">
                 <form method="POST">
                    <div class="form-group">  
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username"  placeholder="Enter username" name="username" value='<?php echo isset($_POST['username']) ? $_POST['username']: $_POST['email']="";  ?>'>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                  </form>
                  <div class="span">username:admin; password:admin</div>
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