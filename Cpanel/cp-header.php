<?php require "authorization.php"; ?>

<?php



include "../inc/config.php";

if(mysql_select_db($db_name) == "$db_name") {

  

}else {

  header("Location: ../install/install.php");

}

$extract_websit_info = mysql_query("select * from website_info");

$logo_extract = mysql_fetch_assoc($extract_websit_info);
$logo = $logo_extract['website_logo'];

// admin data

$user_name = $_SESSION['login'];

$extract_admin = mysql_query("select * from users_table where user_name='$user_name'");

$fetch = mysql_fetch_assoc($extract_admin);

$name = $fetch['name'];



if (!empty($fetch['photo'])) {

 $photo = $fetch['photo'];

}else {

 $photo = "user-default.png";

}



?>

<!DOCTYPE html>

<html lang="en">

 <head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>لوحة التحكم</title>

<link rel="icon" href="uploads/<?php echo $logo; ?>" />   

<link href="../css/animate.css" rel="stylesheet">

<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  

<link rel="stylesheet" href="../css/materliaze-rtl.css" />

<link rel="stylesheet" href="../css/font-awesome.min.css" />

<script src="../js/html5shiv.min.js"></script>

<script src="../js/respond.min.js"></script>

<link href="cpanel-style.css" rel="stylesheet">     

<link href="Cpanel-media.css" rel="stylesheet">

   

 </head>

<body>

<!-- Cpanel Header   -->

<div class="header">

<span class="over-layer"></span>    

<div class="c-logo-right">

<i class="fa fa-tachometer" style="display: inline;float: right;color:white;margin-left:12px;font-size:17pt;"></i><h2

style="display:inline;">لوحة التحكم - <span>V1.0</span> ستورم </h2>    

</div>

    <div class="add-new-header-copy add-new">

    <a href="#">اضافة جديد</a>

    <img src="images/add-icon.png" width="25" height="25" />

    </div>

       <div class="add-new-header-copy">

    <a href="../index.php" target="_blank">الذهاب للموقع</a>

    <img src="images/home-icon.png" width="25" height="25" />

    </div>

    <div class="admin-welcome">

    <img src="uploads/profile_pic/<?php echo $photo; ?>" />

        <span>...مرحبا بك</span>

        <h3><?php echo $name; ?></h3><h3><img src="images/online.png" width="5" height="5"/></h3>

    </div>

    <div class="admin-info z-depth-2">

        <ul>

        <a class="account-setting" style="cursor:pointer;"><li>اعدادات الحساب</li></a>

        <a class="help" style="cursor:pointer;"><li>مساعدة</li></a>

        <a href="logout.php"><li>تسجيل الخروج</li></a>

        

        </ul>

    </div>

</div>

<script src="../js/jquery-3.1.0.min.js"></script>

<script>

  $(".help").click(function () {

 $(".cpanel-left").load("support.php"); 

   });

    $(".account-setting").click(function () {

 $(".cpanel-left").load("account-setting.php"); 

   });

</script>

<!-- End Cpanel Header   -->    