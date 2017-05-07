<?php require "authorization.php"; ?>
<?php

require "../inc/config.php";

$name = $_POST['name'];
$content = $_POST['content'];
$id = $_POST['id'];
$update = mysql_query("update pages_table set page_name='$name', page_content='$content' where id=".$id);

?>