<?php
include "includes/classes/music.php";
$music=new music();
$music->deleteMusic($_GET['music_id']);
