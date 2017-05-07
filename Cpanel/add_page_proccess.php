<?php require "authorization.php"; ?>

<?php

require "../inc/config.php";



$name1 = $_POST['name'];
$name = htmlspecialchars($name1);

$conent1 = $_POST['content'];
$content = htmlspecialchars($content1);

$date = date('d/m/Y h:i a', time());

$add_page = mysql_query("insert into pages_table (page_name,page_content,page_date) values('$name','$conent','$date')");



die();









?>