<?php 

class alert{
    public function alert_success($message){
        echo '<div class="alert alert-success">'.$message.'</div>';
    }
    public function alert_danger($message){
        echo '<div class="alert alert-danger">'.$message.'</div>';
    }
}



?>