<?php require "authorization.php"; ?>
<?php

require "../inc/config.php";
$id = intval($_GET['id']);
$delete_post = mysql_query("DELETE from shows_table where id=".$id);
header("Location: index.php?load=allarticles&&proccess=deletesuccess");

?>