<?php
session_start();
if (!(isset( $_SESSION['email']))) {
header('location:login.php');
}
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Account-Music Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css">
    <script src="assets/js/main.js"></script>   
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
              <a class="nav-link" href="dashboard.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">About Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="myaccount.php">My Account <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="includes/functions/logout.php" id="logout">Logout</a>
              </li>
          </ul>
        </div>
      </nav>
      
      <div class="container" style="margin-top: 80px">
            <h1 class="display-4">My Account</h1>
            <br/>
           <?php
           include "includes/classes/user.php";
            $user=new user();
            if(isset($_POST['update'])){
                $user->setFullname($_POST['fullname']);
                $user->setEmail($_POST['email']);
                $user->setGender($_POST['gender']);
                $user->setPassword($_POST['password']);
                $user->update($_SESSION['id']);
            }

            $x=$user->selectUser($_SESSION['id']);
            foreach($x as $row){
              echo '<form id="myaccount" name="myaccount" method="POST">
              <div class="row">
                    <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Full name" name="fullname" value="'.$row['fullname'].'"  required>
                            </div>
                            <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email" value="'.$row['email'].'" required>
                            </div>
                            <div class="form-group">
                                    <label for="gender">Gender</label>
                                        <select class="form-control" name="gender" id="gender" value="'.$row['gender'].'"  required>
                                                <option></option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                        </select>
                            </div>
                            <div class="form-group">
                                    <label for="gender">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required value=" '.$row['password'].'">
                            </div>
                            </div> 
                    
                        </div>
                        
                        
                    </form>';
            }
           ?>
     
                    <div class="row">&nbsp; &nbsp; &nbsp; <button type="button" id="edit" class="btn btn-dark" name="Edit">Edit</button>&nbsp; 
                        <button type="submit" form="myaccount" class="btn btn-dark" id="update" name="update" >Update</button>&nbsp;<button type="button" class="btn btn-dark" id="cancel" name="cancel" >Cancel</button>
                    </div>
              <div class="row">
               
              </div>
            </div>

  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>  
  <script src="assets/js/main.js"></script>
  <script>
      let main=new Main();
    $(document).ready(function(){
      $("#logout").click(function(){
        window.location.href = "includes/functions/logout.php";
      });
      main.enableEdit(false);

      $("#edit").click(function(){
          main.enableEdit(true);
      })
      $("#cancel").click(function(){
          main.enableEdit(false);
      })
    });
    </script>

</body>
</html>