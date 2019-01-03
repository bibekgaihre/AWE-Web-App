<?php
include "config/init.php";
include "includes/functions/alert.php";

class music{
    private $music_id;
    private $name;
    private $artist;
    private $album;
    private $released_date;
    private $genre;
    private $image;
    
    public function __construct(){
        $this->connection=new init();
        $this->alert=new alert();
    }


    

    /**
     * Get the value of music_id
     */ 
    public function getMusic_id()
    {
        return $this->music_id;
    }

    /**
     * Set the value of music_id
     *
     * @return  self
     */ 
    public function setMusic_id($music_id)
    {
        $this->music_id = $music_id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of artist
     */ 
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set the value of artist
     *
     * @return  self
     */ 
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get the value of album
     */ 
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set the value of album
     *
     * @return  self
     */ 
    public function setAlbum($album)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get the value of released_date
     */ 
    public function getReleased_date()
    {
        return $this->released_date;
    }

    /**
     * Set the value of released_date
     *
     * @return  self
     */ 
    public function setReleased_date($released_date)
    {
        $this->released_date = $released_date;

        return $this;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function create(){
        $name=$this->getName();
        $artist=$this->getArtist();
        $album=$this->getAlbum();
        $released_date=$this->getReleased_date();
        $genre=$this->getGenre();
        $image=$this->getImage();
        
        $create="INSERT INTO `music_library`.`music`(`name`,`artist`,`album`,`released_date`,`genre`,`image`) VALUES('$name','$artist','$album','$released_date','$genre','$image') ";
        $this->connection->CUD($create);
        $this->alert->alert_success("Music has been uploaded");
        return true;
    }   
    public function selectmusic(){
        $select="select * from music";
        return $this->connection->select($select);
    }

    public function selectmusicbypage($start,$limit){
        $select="Select * from music order by music_id ASC LIMIT $start,$limit";
        return $this->connection->select($select);
    }

    public function countMusic(){
        $count="select * from music";
        return $this->connection->checkRows($count);
    }
    // public function searchmusic(){
    //     $name=$this->getName();
    //     $search="select name from music where music like '%".$name."% ' ";
    //     return $this->connection->select($search);

    // }

    public function deleteMusic($music_id){
        $delete="delete from music where music_id=$music_id";
        $this->connection->CUD($delete);
        header("location:listmusicadmin.php");

    }
}


?>