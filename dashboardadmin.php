
<?php 
session_start();
if (!(isset( $_SESSION['username'])=="admin")) {
header('location:adminlogin.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard-Music Library</title>
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
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
              </li>
          </ul>
        </div>
      </nav>
      
      <div class="container" style="margin-top: 80px">
            <h1 class="display-4">Admin Panel</h1>
            <br/>
           
              <div class="row">
                  
                    
              </div>
              <div class="row">
                    <div class="col-lg-6">
                    <button type="button" class="btn btn-secondary btn-lg btn-block" id="createmusic">Create Music</button>
                    </div>
                  
              </div>
              <br />
              <div class="row">
                  <div class="col-lg-6">
                      <button type="button" class="btn btn-secondary btn-lg btn-block" id="listmusic">List Music</button>
                      </div>
              </div>
              <br />
              <div class="row">
                  <div class="col-lg-6">
                      <button type="button" class="btn btn-secondary btn-lg btn-block" id="xml">XML Data</button>
                      </div>
              </div>
              <br/>
              <div class="row">
                  <div class="col-lg-6">
                      <button type="button" class="btn btn-secondary btn-lg btn-block" id="json">JSON Data</button>
                      </div>
              </div>
      </div>

  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>  
<script>
  $(document).ready(function(){
    $("#createmusic").click(function(){
      window.location='addmusic.php';
    })
    $("#xml").click(function(){
      window.location="musicxml.php";
    })
    $("#json").click(function(){
      window.location="musicjson.php";
    })
    $("#listmusic").click(function(){
      window.location="listmusicadmin.php"
    })
  })
</script>

</body>
</html>