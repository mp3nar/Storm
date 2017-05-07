<?php include "cp-header.php"; ?>

<?php include "cpanel-right.php"?>

<?php

echo '

<script src="../js/jquery-3.1.0.min.js"></script>

<script>

$(function () {



 $(".cpanel-left").load("account-setting.php");



});

</script>

';



?>

<?php

$login = $_SESSION['login'];

$get_data = mysql_query("select * from users_table where user_name='$login'");

$base_pic = mysql_fetch_assoc($get_data);

$base_user_pic = $base_pic['photo'];

@$name = $_POST['name'];

@$user_name = $_POST['user_name'];

@$user_email = $_POST['user_email'];

@$user_password = $_POST['user_password'];

if (!empty($name) && !empty($user_name) && !empty($user_email) && !empty($user_password)) {

if (empty($_FILES['user_picture']['name'])) {

    if (empty($base_user_pic)) {

    $profile_picture = "";

    }else {

        $profile_picture = $base_user_pic;

    }

}else {

$valid_file_types = array(

    "image/gif",

    "image/png",

    "image/jpeg",

    "image/pjpeg",

);
if (in_array($_FILES['user_picture']['type'],$valid_file_types)) {

   

$profile_picture = $_FILES['user_picture']['name'];

move_uploaded_file($_FILES['user_picture']['tmp_name'], 'uploads/profile_pic/'.$_FILES['user_picture']['name'] );

  

}else {

  $profile_picture = "user-default.png";

}



}

$update_user_data = mysql_query("update users_table set name='$name', user_name='$user_name', user_email='$user_email'

                                , user_password='$user_password', photo='$profile_picture' where id=".$base_pic['id']);

if ($update_user_data == true) {

    echo '

    <div class="website_info_saved user_updated" style="   position: fixed;

    top: 0;

    width: 100%;

    height: auto;

    overflow: auto;

    left:0px;

    padding: 20px 15px 20px 15px;

    text-align: center;

    background-color: #33d2fd;

    z-index: 9999999999999;

    display:none;"><h2

        style=" color: white;

    margin: 0;

    font-size: 17pt; font-family:DroidKufi;">تم تحديث معلوماتك بنجاح</h2></div>

    <script src="../js/jquery-3.1.0.min.js"></script>

<script>

$(function () {

$(".cpanel-left").load("account-setting.php");

 $(".user_updated").slideDown();

 setTimeout(function () {

  

  $(".user_updated").slideUp();

 }, 2000);



});



</script>



    ';

    $_SESSION['login'] = $user_name;

    

    

}

}else {

  echo '

  <div class="website_info_saved comp-data" style="   position: fixed;

    top: 0;

    width: 100%;

    height: auto;

    overflow: auto;

    left:0px;

    padding: 20px 15px 20px 15px;

    text-align: center;

    background-color: #b20000;

    z-index: 9999999999999;

    display:block;"><h2

        style=" color: white;

    margin: 0;

    font-size: 17pt; font-family:DroidKufi;">الرجاء ملئ جميع البيانات</h2></div>

  <script src="../js/jquery-3.1.0.min.js"></script>

<script>

$(function () {



 $(".comp-data").slideDown();

 setTimeout(function () {

  

  $(".comp-data").slideUp();

 }, 2000);



});

</script>

  ';

}



?>

<div class="cpanel-left">

    

</div>