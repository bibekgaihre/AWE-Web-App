<?php
header('Content-type:application/json');

$connection=mysqli_connect("localhost","root","","music_library");

if (mysqli_connect_errno())
{
    echo "Connection Failed " . mysqli_connect_error();
}
$select="select music_id,name,artist,album,genre from music";

$result=mysqli_query($connection,$select);

$rows=array();
while($r=mysqli_fetch_assoc($result)){
$rows['object_name'][] = $r;
}

print json_encode($rows);