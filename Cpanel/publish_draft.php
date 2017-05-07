<?php require "authorization.php"; ?>
<?php

require "../inc/config.php";

$id = intval($_GET['id']);

$publish = mysql_query("update shows_table set show_structer='1' where id=".$id);

if ($publish == true) {
    header("Location: index.php?load=allarticles&&proccess=publishsuccess");
}
?>