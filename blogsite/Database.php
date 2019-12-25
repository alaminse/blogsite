<?php
Class Database{
 public $host   = DB_HOST;
 public $user   = DB_USER;
 public $pass   = DB_PASS;
 public $dbname = DB_NAME;


 public $link;
 public $error;

 public function __construct(){
  $this->connectDB();
 }

private function connectDB(){
 $this->link = new mysqli($this->host, $this->user, $this->pass,
  $this->dbname);
 if(!$this->link){
   $this->error ="Connection fail".$this->link->connect_error;
  return false;
 }
 }

// Select or Read data
public function select($query){
  $result = $this->link->query($query) or die($this->link->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  } else {
    return false;
  }
 }
 //Count total
public function count($count_user){
  $result = $this->link->query($count_user) or die($this->link->error.__LINE__);
  if($result->num_rows > 0){
      return $result;
  } else {
    return false;
  }
 }
public function count1($count_post){
  $result1 = $this->link->query($count_post) or die($this->link->error.__LINE__);
  if($result1->num_rows > 0){
      return $result1;
  } else {
    return false;
  }
 }
public function allUser($User){
  $result2 = $this->link->query($User) or die($this->link->error.__LINE__);
  if($result2->num_rows > 0){
      return $result2;
  } else {
    return false;
  }
 }
public function allPost($allPost){
  $result3 = $this->link->query($allPost) or die($this->link->error.__LINE__);
  if($result3->num_rows > 0){
      return $result3;
  } else {
    return false;
  }
 }


// Insert data
public function insert($query){
 $insert_row = $this->link->query($query) or
   die($this->link->error.__LINE__);
 if($insert_row){
   return $insert_row;
 } else {
   return false;
  }
 }

// Update data
 public function update($query){
 $update_row = $this->link->query($query) or
   die($this->link->error.__LINE__);
 if($update_row){
  header('location: admin.php');
 } else {
  return false;
  }
 }

// Delete data
 public function delete($query){
 $delete_row = $this->link->query($query) or
   die($this->link->error.__LINE__);
 if($delete_row){
   header("location: admin.php");
 } else {
   return false;
  }
 }

}
