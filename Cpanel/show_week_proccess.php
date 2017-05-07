<?php include "cp-header.php"; ?>

<?php include "cpanel-right.php"?>

<?php

// show info

$weekshow_info = mysql_query("select * from weekshow");

$weekshow_data = mysql_fetch_assoc($weekshow_info);





    

// data to update

$weekshow_name1 = $_POST['weekshow_name'];
$weekshow_name = htmlspecialchars($weekshow_name1);

$weekshow_story2 = $_POST['weekshow_story'];
$weekshow_story = htmlspecialchars($weekshow_story2);

$weekshow_src = $_POST['weekshow_src'];

$weekshow_statue = $_POST['weekshow_statue'];

if (empty($_FILES['weekshow_img']['name'])) {

    $weekshow_img = $weekshow_data['weekshow_image'];

}else {

$valid_file_types = array(

    "image/gif",

    "image/png",

    "image/jpeg",

    "image/pjpeg",

);
if (in_array($_FILES['weekshow_img']['type'],$valid_file_types)) {

   

$weekshow_img = $_FILES['weekshow_img']['name'];

move_uploaded_file($_FILES['weekshow_img']['tmp_name'], 'uploads/weekshow_images/'.$_FILES['weekshow_img']['name'] );


  

}else {

  $weekshow_img = "no-img.jpg";

}


}

// update data

if (mysql_num_rows($weekshow_info) < 1) {

$update_weekshow = mysql_query("insert into weekshow  (weekshow_name,weekshow_story,weekshow_image,weekshow_src,weekshow_statue)

                               values('$weekshow_name','$weekshow_story',

                               '$weekshow_img','$weekshow_src','$weekshow_statue')");



}else {

$update_weekshow = mysql_query("UPDATE weekshow SET weekshow_name='$weekshow_name', weekshow_story='$weekshow_story',

weekshow_image='$weekshow_img', weekshow_src='$weekshow_src', weekshow_statue='$weekshow_statue'");

}





?>

<div class="website_info_saved"><h2>تم حفظ المعلومات بنجاح</h2></div> 

<div class="cpanel-left">

    

    

    

</div>

<script src="../js/jquery-3.1.0.min.js"></script>

<script type="text/javascript">

    

$(function(){

    

    $('.cpanel-left').load('weekshow-setting.php');

    $('body,html').animate({scrollTop:'300'});

   $('.website_info_saved').slideDown();

   setTimeout(function () {

    $('.website_info_saved').slideUp();

    

    }, 2000);

    

   }

);

    

</script>



