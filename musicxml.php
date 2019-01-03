<?php


include "includes/classes/music.php";
$music=new music();

$xml ='<?xml version="1.0" encoding="utf-8"?>';
$xml.="<musics>";
if($data=$music->selectmusic()){
    foreach($data as $row){
        $xml .="<music>";
        $xml .="<name>".$row['name']."</name>";
        $xml .="<album>".$row['album']."</album>";
        $xml .="<artist>".$row['artist']."</artist>";
        $xml .="<genre>".$row['genre']."</genre>";
      
        $xml .="</music>";
    }
}
$xml.="</musics>";

$obj=new SimpleXMLElement($xml);
$x=$obj->asXML();
echo $x;
header("Content-type: text/xml");
exit();

