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
              <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="myaccount.php" id="myaccount">My Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="includes/functions/logout.php" id="logout">Logout</a>
              </li>
          </ul>
        </div>
      </nav>
      
      <div class="container" style="margin-top: 80px">
            <h1 class="display-4">Library</h1>
            <br/>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item">
                    <img src="assets/images/cover1.JPG" class="d-block w-100" alt="p">
                  </div>
                  <div class="carousel-item active">
                    <img src="assets/images/cover2.JPG" class="d-block w-100" alt="d">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/images/cover3.JPG" class="d-block w-100" alt="i">
                  </div>
                </div>
               
              </div>    
           
              <div class="row">
               
                  <div class="span" style="float: none;margin: 0 auto">
                        <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search music" aria-label="Search" id="search" name="search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                              </form></div> 
                      <div id="result"></div>
              </div>
              <div class="row">
                <?php 
                  include "includes/classes/music.php";
                  $music=new music();
                  $x=$music->selectmusic();
                  foreach($x as $row){
                    echo  '<div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" class="card-img-top" alt="...">
                                    <div class="card-body">
                                      <h5 class="card-title">'.$row['name'].'</h5>
                                      <p class="card-text"><Strong>Artist:</Strong> '.$row['artist'].'</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item"><strong>Album:</strong>'.$row['album'].' </li>
                                      <li class="list-group-item"><strong>Released on:</strong> '.$row['released_date'].'</li>
                                      <li class="list-group-item"><strong>Genre:</strong> '.$row['genre'].'</li>
                                    </ul>
                                  </div>
                    </div>
                  
                  ';
                  }
                 ?>
              </div>
      </div>

  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>  
  <script>
    $(document).ready(function(){
      $("#logout").click(function(){
        window.location.href = "includes/functions/logout.php";
      });
      $("#myaccount").click(function(){
        window.location.href="myaccount.php";
      });
      $("#search").keyup(function(){
          var txt=$(this).val();
          if(txt !='')
          {

          }
          else{
            $('#result').html('');
            $.ajax({
              url:"",
              method:"POST",
              data:{search:txt},
              dataType:"text",
              success:function(data){
                $('#result').html(data);
              }
            })
          }
      })
    });

    </script>

</body>
</html>