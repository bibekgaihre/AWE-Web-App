
<?php 
session_start();
if (!(isset( $_SESSION['username'])=="admin")) {
header('location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>addmusic-Music Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
              <a class="nav-link" href="dashboardadmin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="includes/functions/logout.php">Logout</a>
              </li>
          </ul>
        </div>
      </nav>
      
      <div class="container" style="margin-top: 80px">
            <h1 class="display-4">Add Music</h1>
            <br/>
              <br />
              <?php
                include "includes/classes/music.php";
                $music=new music();
                if(isset($_POST['create'])){
                  $file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                  $music->setName($_POST['musicname']);
                  $music->setArtist($_POST['artist']);
                  $music->setAlbum($_POST['album']);
                  $music->setGenre($_POST['genre']);
                  $music->setImage($file);
                  $date=strtotime($_POST['releaseddate']);
                  $date=date("Y-m-d",$date);
                  $music->setReleased_date($date);
                  $music->create();
                }
              ?>
              <div class="row">
                  <div class="col-lg-6">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="musicname">Song Name</label>
                      <input type="text" class="form-control" id="musicname" placeholder="Enter music name" name="musicname" required>
                    </div>
                    <div class="form-group">
                      <label for="artist">Artist</label>
                      <input type="text" class="form-control" id="artist" placeholder="Enter artist name" name="artist" required>
                    </div>
                    <div class="form-group">
                        <label for="artist">Album</label>
                        <input type="text" class="form-control" id="album" placeholder="Enter Album name" name="album" required>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select class="form-control" name="genre" id="genre" required>
                          <option value="acoustic">Acoustic</option>
                          <option value="blues">Blues</option>
                          <option value="caribbean">Caribbean</option>
                          <option value="comedy">Comedy</option>
                          <option value="country">Country</option>
                          <option value="electronic">Electronic</option>
                          <option value="folk">Folk</option>
                          <option value="hiphop">Hip-Hop</option>
                          <option value="jazz">Jazz</option>
                          <option value="latin">Latin</option>
                          <option value="metal">Metal</option>
                          <option value="pop">Pop</option>
                          <option value="rnbandsoul">R&B and soul</option>
                          <option value="rock">Rock</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="releaseddate">Released Date</label>
                        <input type="text" id="datepicker" class="form-control" tabindex="6" name="releaseddate" required>
                    </div>
                    <div class="form-group">
                    <label for="file">Cover Art</label>
                    <div class="input-group mb-3">
                                 <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" >
                        <label class="custom-file-label" for="image">Choose file</label>
                           </div>
                    </div>
                    </div>
                    
                    <br/>

                    <button type="submit" class="btn btn-primary" id="create" name="create">Create</button>
                  </form>
                      </div>
              </div>
              <br />
              
      </div>

  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      
      $(document).ready( function() {
            $( "#datepicker" ).datepicker();
            $('#create').click(function(){
              var  image_name=$('#image').val();
              if(image_name==''){
                alert ("please select image");
                return false;

              }
              else{
                var extension=$('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1){
                  alert('Invalid Image File');
                  $('#image').val('');
                  return false;

                }
              }
            })
        } );
      </script>

</body>
</html>