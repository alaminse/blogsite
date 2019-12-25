<?php
  include "config.php";
  include "Database.php";
?>
<?php
  $db = new Database();
  if(isset($_POST['submit'])){

   $tag = mysqli_real_escape_string($db->link, $_POST['tag']);

     //==========================================
                      //Query
     //==========================================
    $query = "INSERT INTO tag (tag) VALUES ('$tag')";

    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<span class='success pl-5'> Tag Successfully.</span>";
       header("location: admin.php");
    }else {
     echo "<span class='error'> Somthing is wrong !! </span>";
    }
  }
?>
