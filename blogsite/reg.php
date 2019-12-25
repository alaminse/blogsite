<?php
  include "config.php";
  include "Database.php";
?>
<?php
  $db = new Database();
  if(isset($_POST['submit'])){

   $role  = 1;
   $status = 1;
   $name = mysqli_real_escape_string($db->link, $_POST['name']);
   $username = mysqli_real_escape_string($db->link, $_POST['username']);
   $email = mysqli_real_escape_string($db->link, $_POST['email']);
   $pass = mysqli_real_escape_string($db->link, $_POST['pass']);

   //==========================================
                    //Query
   //==========================================
  $query = "INSERT INTO logreg (role, name, username, email, pass, status) VALUES ('$role', '$name','$username','$email', '$pass', '$status')";

  $inserted_rows = $db->insert($query);
  if ($inserted_rows) {
   echo "<span class='success pl-5'> Register Successfully.</span>";
  }else {
   echo "<span class='error'> Somthing is wrong !! </span>";
  }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
	<section id="reg">
		<div class="container">
			<form action="" method="post" enctype="multipart/form-data">
        <h2> <u>Register Form</u> </h2>
			  <div class="form-group pt-4">
			    <label for="exampleInputEmail1"> Role </label>
			    <input type="text" class="form-control" name="role" id="exampleInputRole" value="user" disabled required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Full Name</label>
			    <input type="text" class="form-control" name="name" id="exampleInputName" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">User Name</label>
			    <input type="text" class="form-control" name="username" id="exampleInputUsername" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="email" id="exampleInputEmail1" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" required>
			  </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Register"/>
        <div class="form-group mt-3">
			    <a href="login.php" class="text-decoration-none text-success "> Already Have An Account </a>
			  </div>
			</form>
		</div>
	</section>


  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
