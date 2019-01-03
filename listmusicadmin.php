
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
    <title>list music-Music Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="assets/js/jquery.simplePagination.js"></script>
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
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="includes/functions/logout.php">Logout</a>
              </li>
          </ul>
        </div>
      </nav>
      
      <div class="container" style="margin-top: 80px">
            <h1 class="display-4">List Music</h1>
            <br/>
              <br />
              <div class="row">
                  <div class="col-lg-12">
                  <table class="table table-bordered" style="font-size:small">
                  <thead>
                      <tr>
                        <th>S.N</th>
                        <th>Song Name</th>
                        <th>Artist</th>
                        <th>Album</th>
                        <th>Genre</th>
                        <th>Cover Art</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "includes/classes/music.php";
                    $music=new music();
                    $count=0;
                    $limit=5;
                    if(isset($_GET["page"])){
                        $page=$_GET["page"];
                    }
                    else{
                        $page=1;
                    };
                    $start=($page-1)*$limit;
                    $delete_message="Are you sure to delete?";
                    if(!$music->selectmusicbypage($start,$limit)){
                        echo '<div class="alert alert-danger">0 Book added till now</div>';
                    }
                    else{
                        $fetch=$music->selectmusicbypage($start,$limit);
                        foreach($fetch as $row){
                            $count++;
                            echo' <tr>';
                            echo' <td>'.$count.'</td>';
                            echo'<td>'.$row["name"].'</td>';
                            echo'<td>'.$row["artist"].'</td>';
                            echo'<td>'.$row["album"].'</td>';
                            echo'<td>'.$row["genre"].'</td>';
                            echo'<td><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" class="card-img-top" alt="..."></td>';
                            echo '<td> <a href="deletemusic.php?music_id='.$row["music_id"].'" class="btn btn-danger btn-sm" title="Delete" >Delete</a></td> ';
                            echo '</tr>';
                        }
                        $total=$music->countMusic();
                        $total=ceil($total/$limit);
                        $pagLink="<nav><ul class='pagination'>";
                        for($i=1;$i<=$total;$i++){
                            $pagLink.="<li><a href='index.php?page=".$i."'>".$i."</a></li>";

                        };
                        echo $pagLink."</ul></nav>";
                    }
                    ?>
                  </tbody>
                  </table>
                      </div>
              </div>
              <br />
              
      </div>

  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script type="text/javascript">
      
      $(document).ready( function() {
        $('.pagination').pagination({
            items:<?php echo $total;?>,
            itemsonPage:<?php echo $limit;?>,
            cssStyle:'light-theme',
            currentPage:<?php echo $page;?>,
            hrefTextPrefix:'listmusicadmin.php?page='
        })
      }
      </script>

</body>
</html>