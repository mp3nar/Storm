<?php include "cp-header.php"; ?>

<?php include "cpanel-right.php"?>

<?php

// show info

$website_info = mysql_query('select * from website_info') or die('error');

$website_data_fetch = mysql_fetch_assoc($website_info);



if (isset($_POST['website_name']) && isset($_POST['website_description']) && isset($_POST['website_words'])

&& isset($_POST['website_statue']) ) {

    

// data to update

$name1 = $_POST['website_name'];
$name = htmlspecialchars($name1);

$desc1 = $_POST['website_description'];
@$desc = htmlspecialchars($desc1);
$words2 = $_POST['website_words'];
@$words = htmlspecialchars($words2);

$statue = $_POST['website_statue'];

$slider_statue = $_POST['slider_statue'];

$articles_number1 = $_POST['articles_number'];
@$articles_number = htmlspecialchars($articles_number1);
$ads_statue = $_POST['ads_statue'];

if (empty($_FILES['website_logo']['name'])) {

    $logo_name = $website_data_fetch['website_logo']; 

}else {



$valid_file_types = array(

    "image/gif",

    "image/png",

    "image/jpeg",

    "image/pjpeg",

);

if ($_FILES['website_logo']['size'] !== 0) {

if (in_array($_FILES['website_logo']['type'],$valid_file_types)) {

   move_uploaded_file($_FILES['website_logo']['tmp_name'], 'uploads/'.$_FILES['website_logo']['name'] );

   $logo_name = $_FILES['website_logo']['name'];

  

}else {

  $logo_name = "logo.png";
}

}

}

// update data

$update_website_info = mysql_query("UPDATE website_info SET website_name='$name', website_description='$desc', website_words

='$words', website_statue='$statue', website_logo='$logo_name', slider_statue='$slider_statue', articles_number='$articles_number',

ads_statue='$ads_statue'");



if (isset($update_website_info)) {

    

   

    

}



}



?>

<div class="website_info_saved"><h2>تم حفظ المعلومات بنجاح</h2></div> 

<div class="cpanel-left">

    

    

    

</div>

<script src="../js/jquery-3.1.0.min.js"></script>

<script type="text/javascript">

    

$(function(){

    

    $('.cpanel-left').load('settings.php');

    $('body,html').animate({scrollTop:'300'});

   $('.website_info_saved').slideDown();

   setTimeout(function () {

    $('.website_info_saved').slideUp();

    

    }, 2000);

    

   }

);

    

</script>