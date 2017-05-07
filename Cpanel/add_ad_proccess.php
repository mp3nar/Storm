<?php include "cp-header.php"; ?>

<?php include "cpanel-right.php"?>

<?php

// show info





    

// data to update

$ad_name1 = $_POST['ad_name'];
$ad_name = htmlspecialchars($ad_name1);

$ad_link1 = $_POST['ad_link'];
$ad_link = htmlspecialchars($ad_link1);

$valid_file_types = array(

    "image/gif",

    "image/png",

    "image/jpeg",

    "image/pjpeg",

);
if (in_array($_FILES['ad_img']['type'],$valid_file_types)) {

   

$ad_img = rand(1,99999) . '.' . end(explode(".",$_FILES["ad_img"]["name"]));

move_uploaded_file($_FILES['ad_img']['tmp_name'], 'uploads/ads_images/'.$ad_img );


  

}else {

  $ad_img = "no-img.jpg";

}





// update data



$update_weekshow = mysql_query("insert into ads_table  (ad_name,ad_link,ad_img)

                               values('$ad_name','$ad_link','$ad_img')");









?>

<div class="website_info_saved"><h2>تم اضافة الاعلان بنجاح</h2></div> 

<div class="cpanel-left">

    

    

    

</div>

<script src="../js/jquery-3.1.0.min.js"></script>

<script type="text/javascript">

    

$(function(){

    

    $('.cpanel-left').load('add_new_ad.php');

  

   $('.website_info_saved').slideDown();

   setTimeout(function () {

    $('.website_info_saved').slideUp();

    

    }, 2000);

    

   }

);

    

</script>



