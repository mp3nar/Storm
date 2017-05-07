<?php require "authorization.php"; ?>

<?php

require "../inc/config.php";

$name1 = $_POST['name'];
$name = htmlspecialchars($name1);

$user_name1 = $_POST['user_name'];
$user_name = htmlspecialchars($user_name1);

$user_email1 = $_POST['user_email'];
$user_email = htmlspecialchars($user_email1);

$user_password1 = $_POST['user_password'];
$user_password = htmlspecialchars($user_password1);

if ($_POST['authorize'] == 1) {

    $auth = "مساعد مدير";

}else if ($_POST['authorize'] == 2) {

    $auth = "محرر";

}





$add_member = mysql_query("insert into users_table (name,user_name,user_email,user_password,authorization) values(

                          '$name','$user_name','$user_email','$user_password','$auth')");



                          







?>