<?php

$path = "../install";

function Delete($path)

{

    if (is_dir($path) === true)

    {

        $files = array_diff(scandir($path), array('.', '..'));



        foreach ($files as $file)

        {

            Delete(realpath($path) . '/' . $file);

        }



        return rmdir($path);

    }



    else if (is_file($path) === true)

    {

        return unlink($path);

    }



    return false;

}



Delete($path);

?>

<?php



require "../inc/config.php";

session_start();



if(isset($_SESSION['login'])) {

    header("Location: index.php");

}

if (isset($_POST['login'])) {

$user_name1 = $_POST['user_name'];
@$user_name = htmlspecialchars($user_name1);

$user_password1 = $_POST['user_password'];
@$user_password = htmlspecialchars($user_password1);

if(!empty($user_name) && !empty($user_password)) {

 $check = mysql_query("select * from users_table where user_name='$user_name' and user_password='$user_password'");

 $num = mysql_num_rows($check);

 if ($num > 0) {

    $data = mysql_fetch_assoc($check);

    $name = $data['user_name'];

    $pass = $data['user_password'];

    if ($user_name == $name && $user_password == $pass) {

        echo "تم تسجيل الدخول بنجاح";

        $_SESSION['login'] = $user_name;

        header("Location: index.php");

    }

 }else {

      echo '

      

       <div class="website_info_saved login-error" style="   position: fixed;

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

    font-size: 17pt; font-family:DroidKufi;">يوجد خطأ في اسم المستخدم او كلمة المرور</h2></div>

     <script src="../js/jquery-3.1.0.min.js"></script>

     <script>

     $(".website_info_saved").slideDown();

    setTimeout(function () {

        $(".website_info_saved").slideUp();

        }, 2000);

     </script>

      

      ';

 }

}else {

       echo '

      

       <div class="website_info_saved login-error" style="   position: fixed;

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

     $(".website_info_saved").slideDown();

    setTimeout(function () {

        $(".website_info_saved").slideUp();

        }, 2000);

     </script>

      

      '; 

}

}

?>





<!DOCTYPE html>

<html lang="en">

 <head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>ستورم-لوحة التحكم</title>

<link rel="icon" href="uploads/<?php echo $logo; ?>" />   

<link href="../css/animate.css" rel="stylesheet">

<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  

<link rel="stylesheet" href="../css/materliaze-rtl.css" />

<link rel="stylesheet" href="../css/font-awesome.min.css" />

<script src="../js/html5shiv.min.js"></script>

<script src="../js/respond.min.js"></script>

<link href="cpanel-style.css" rel="stylesheet">     

<link href="Cpanel-media.css" rel="stylesheet">

 <style>

    @import url(https://fonts.googleapis.com/css?family=Roboto:300);



.login-page {

  width: 360px;

  padding: 8% 0 0;

  margin: auto;

}

.form {

  position: relative;

  z-index: 1;



      background-image: url(images/shadow2.png);

  max-width: 360px;

  margin: 0 auto 100px;

  padding: 0px 45px 45px 45px;

  text-align: center;

  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

}

.form input {

  font-family: "Roboto", sans-serif;

  outline: 0;

  background: #f2f2f2;

  width: 100%;

  border: 0;

  margin: 0 0 15px;

  padding: 15px;

  box-sizing: border-box;

  font-size: 14px;

}

.form button {

  font-family: "Roboto", sans-serif;

  text-transform: uppercase;

  outline: 0;

  background: #00c7fc;

  width: 100%;

  border: 0;

  padding: 15px;

  color: #FFFFFF;

  font-size: 14px;

  -webkit-transition: all 0.3 ease;

  transition: all 0.3 ease;

  cursor: pointer;

}

.form button:hover,.form button:active,.form button:focus {

  background:#4d5d70

}

.form .message {

  margin: 15px 0 0;

  color: #b3b3b3;

  font-size: 12px;

}

.form .message a {

  color: #4CAF50;

  text-decoration: none;

}

.form .register-form {

  display: none;

}

.container {

  position: relative;

  z-index: 1;

  max-width: 300px;

  margin: 0 auto;

}

.container:before, .container:after {

  content: "";

  display: block;

  clear: both;

}

.container .info {

  margin: 50px auto;

  text-align: center;

}

.container .info h1 {

  margin: 0 0 15px;

  padding: 0;

  font-size: 36px;

  font-weight: 300;

  color: #1a1a1a;

}

.container .info span {

  color: #4d4d4d;

  font-size: 12px;

}

.container .info span a {

  color: #000000;

  text-decoration: none;

}

.container .info span .fa {

  color: #EF3B3A;

}

body {

  background: #3c4251; /* fallback for old browsers */

  font-family: DroidKufi;

    

}

.login-form input,.login-form button {

    font-family: DroidKufi;

}

.sign {

    

    width: 100%;

   padding: 25px;

    display: block;

    text-align: center;

    background-color: 

    

    }

    .sign h2 {

        color:white;

        color: white;

        font-size: 14pt;

        margin: 0;

        

        }

  @media screen and (max-width:450px) {

    .login-page {

        padding: 22% 21px 0;

    }

    

    }      

 </style>  

 </head>

<body>

<div class="login-page">

  <div class="form">

    <div class="sign"><h2>لوحة التحكم</h2></div>



    <form class="login-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

      <input type="text" placeholder="اسم المستخدم" name="user_name"/>

      <input type="password" placeholder="كلمة المرور" name="user_password"/>

      <button name="login">تسجيل الدخول</button>

      

    </form>

  </div>

</div>