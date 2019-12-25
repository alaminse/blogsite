<?php include "include/header.php"; ?>
<?php include "include/navbar.php"; ?>
<?php
include "config.php";
include "Database.php";
?>
<?php

$db = new Database();
$p_author ='noman23';
$query = "SELECT * FROM post WHERE p_author = '$p_author' AND p_status = 1";
$read = $db->select($query);

if(isset($_GET['msg'])){
 echo "<span style='color:green'>".$_GET['msg']."</span>";
}

// if(isset($_POST['submit'])){
//
//  $c_details = mysqli_real_escape_string($db->link, $_POST['c_details']);
//  $p_author = 'noman23';
//
//  //==========================================
//                   //Query
//  //==========================================
// $query = "INSERT INTO comments (c_user, c_details) VALUES ('$c_user', '$c_details')";
//
// $inserted_rows = $db->insert($query);
// if ($inserted_rows) {
//  echo "<span class='success pl-5'> Register Successfully.</span>";
// }else {
//  echo "<span class='error'> Somthing is wrong !! </span>";
// }
//}
?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col">
        <div class="">
          <?php if($read){?>
          <?php
          while($row = $read->fetch_assoc()){
          ?>
        <!-- Title -->
        <h1 class="mt-4"><?php echo $row['p_title']; ?></h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#"><?php echo $row['p_author']; ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><?php echo $row['p_date']; ?></p>

        <hr>


        <!-- Post Content -->
        <p class="lead"><?php echo $row['p_details']; ?></p>

        <hr>
        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Comment</h5>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <textarea class="form-control" name="c_details" rows="3"></textarea>
              </div>
              <input type="submit" class="btn btn-primary" name="submit" value="Comment"/>
            </form>
          </div>
        </div>
        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            <p>nc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
          </div>
        </div>

        <?php } ?>
        <?php } else { ?>
        <p>Data is not available !!</p>
        <?php } ?>
        </div>




        <!-- Comment with nested comments -->
        <!-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            <p>um nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>

          </div>
        </div> -->
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

  <?php include "include/footer.php"; ?>
