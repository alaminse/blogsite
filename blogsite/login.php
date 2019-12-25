<?php
  include "config.php";
  include "Database.php";
?>
<?php
  if (isset($_COOKIE['currentUser'])) {
    header('location: user.php');
  }
  $db = new Database();
  if(isset($_POST['submit'])){

    $role  = mysqli_real_escape_string($db->link, $_POST['role']);
    $username = mysqli_real_escape_string($db->link, $_POST['username']);
    $pass = mysqli_real_escape_string($db->link,($_POST['pass']));

    //==========================================
                     //Query
    //==========================================
   $query = "SELECT role FROM logreg WHERE username = '$username' AND pass = '$pass'LIMIT 1";
   $read = $db->select($query);
   if($read){
     while($row = $read->fetch_assoc()){
       $r_role = $row['role'];
       if ($r_role == 1) {
         setcookie("currentUser",$username,time()+(7*86400));
         header("location: user.php");
       } elseif($r_role == 0) {
         header("location: admin.php");
       }
     }
   }else {
     echo "<span class='error'> Login Failed!! </span>";
   }
 }
?>

 <?php include "include/header.php"; ?>

	<section id="login">
		<div class="container">
			<form action="" method="post">
			  <div class="form-group">
			    <h2> <u>LogIn</u> </h2>
			  </div>
			  <div class="form-group">
			    <select class="custom-select" name="role" required>
			      <option value=""> -- Select -- </option>
			      <option value="0">Admin</option>
			      <option value="1">User</option>
			    </select>
			  </div>
        <div class="form-group">
			    <label for="exampleInputEmail1">User Name</label>
			    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" required>
			  </div>
        <input type="submit" class="btn btn-success" name="submit" value="Log In"/>
        <div class="form-group pt-3">
			    <a href="reg.php" class="text-decoration-none text-success "> I don't Have An Account </a>
			  </div>
			</form>
		</div>
	</section>


  <?php include "include/footer1.php"; ?>
