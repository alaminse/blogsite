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
  value="<?php echo $getData['p_author'] ?>" disabled/></td>
 </tr>
 <tr>
  <td>Title</td>
  <td><input type="text" name="p_title"
  value="<?php echo $getData['p_title'] ?>" disabled/></td>
 </tr>
 <tr>
  <td>Details</td>
  <td> <textarea name="p_details" rows="8" cols="80" disabled><?php echo $getData['p_details'] ?></textarea></td>
 </tr>
 <tr>
  <td>Tag</td>
  <td><input type="text" name="p_tag"
  value="<?php echo $getData['p_tag'] ?>" disabled /></td>
 </tr>
 <tr>
  <td>Date</td>
  <td><input type="text" name="p_date"
  value="<?php echo $getData['p_date'] ?>" disabled /></td>
 </tr>
 <tr>
  <td>Status</td>
  <td><input type="text" name="p_status" value="<?php if ($getData['p_status'] == 1) { echo "Yes";}else{ echo "No";}; ?>" disabled /></td>
 </tr>
 <tr>
  <td></td>
  <td>
    <a class="p-4" href="admin.php">BACK</a>
  </td>
 </tr>

</table>
</form>
<?php include "include/footer1.php"; ?>
