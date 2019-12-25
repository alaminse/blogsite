<?php
include "config.php";
include "Database.php";
$db = new Database();
$id = $_REQUEST['id'];
$query = "DELETE FROM post WHERE p_id=$id";
$read = $db->delete($query);

?>
