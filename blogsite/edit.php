<?php include "include/header.php"; ?>
<?php
include "config.php";
include "Database.php";
?>

<?php
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM post WHERE p_id=$id";
 $getData = $db->select($query)->fetch_assoc();

if(isset($_POST['submit'])){
 $p_author  = mysqli_real_escape_string($db->link, $_POST['p_author']);
 $p_title = mysqli_real_escape_string($db->link, $_POST['p_title']);
 $p_details = mysqli_real_escape_string($db->link, $_POST['p_details']);
 $p_tag = mysqli_real_escape_string($db->link, $_POST['p_tag']);
 $p_status = mysqli_real_escape_string($db->link, $_POST['p_status']);
 if($p_author == '' || $p_title == '' || $p_details == ''|| $p_tag == '' || $p_date=''|| $p_status==''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE post SET p_title = '$p_title', p_details = '$p_details', p_tag = '$p_tag', p_status = '$p_status', p_author = '$p_author', WHERE p_id = '$id'";

  $update = $db->update($query);
 }
}
?>


<?php
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="edit.php?id=<?php echo $id;?>" method="post">
<table>
 <tr>
  <td>Atuthor</td>
  <td><input type="text" name="p_author"
  value="<?php echo $getData['p_author'] ?>"/></td>
 </tr>
 <tr>
  <td>Title</td>
  <td><input type="text" name="p_title"
  value="<?php echo $getData['p_title'] ?>"/></td>
 </tr>
 <tr>
  <td>Details</td>
  <td> <textarea name="p_details" rows="8" cols="80"><?php echo $getData['p_details'] ?></textarea></td>
 </tr>
 <tr>
  <td>Tag</td>
  <td><input type="text" name="p_tag"
  value="<?php echo $getData['p_tag'] ?>"/></td>
 </tr>
 <tr>
  <td>Date</td>
  <td><input type="text" name="p_date"
  value="<?php echo $getData['p_date'] ?>"/></td>
 </tr>
 <tr>
  <td>Status</td>
  <td><input type="text" name="p_status"
  value="<?php echo $getData['p_status'] ?>"/></td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Update"/>
  </td>
 </tr>

</table>
</form>
<?php include "include/footer1.php"; ?>
