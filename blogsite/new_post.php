<?php
  include "include/header.php";
  include "config.php";
  include "Database.php";
?>
<?php
  $db = new Database();
  if(isset($_POST['submit'])){

   $p_title = mysqli_real_escape_string($db->link, $_POST['p_title']);
   $p_details = mysqli_real_escape_string($db->link, $_POST['p_details']);
   $p_tag = mysqli_real_escape_string($db->link, $_POST['p_tag']);
   if (empty($_POST['p_status'])) {
     $p_status =0;
   }else {
     $p_status = mysqli_real_escape_string($db->link, $_POST['p_status']);
   }
   $p_author = 'noman23';

   //==========================================
                    //Query
   //==========================================
  $query = "INSERT INTO post (p_title, p_details, p_tag, p_status, p_author) VALUES ('$p_title', '$p_details','$p_tag','$p_status', '$p_author')";

  $inserted_rows = $db->insert($query);
  if ($inserted_rows) {
   echo "<span class='success pl-5'> Register Successfully.</span>";
  }else {
   echo "<span class='error'> Somthing is wrong !! </span>";
  }
  }
?>

<section class="container">
  <div  id="AddNewPost" >
    <nav class="navbar navbar-light bg-light">
      <form class="form-inline">
        <h1>NEW POST</h1>
        <input class="form-control mr-sm-2 ml-5" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputTitle">Title</label>
        <input type="text" class="form-control" id="title" name="p_title" aria-describedby="titleHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputDiscription">Post Details</label>
        <textarea name="p_details" class="form-control" id="Discription" aria-describedby="DiscriptionHelp" rows="8" cols="80"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputTagCatagories">Tag/Catagories</label>
        <input type="text" name="p_tag" class="form-control" id="TagCatagories" aria-describedby="TagCatagoriesHelp">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" name="p_status" class="form-check-input" value="1" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Publish</label>
      </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Publish"/>
    </form>
  </div>
</section>

<?php include "include/footer1.php"; ?>
