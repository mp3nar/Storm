<?php include "cp-header.php"; ?>

<?php include "cpanel-right.php"?>

<?php



if(isset($_POST['cat_name']) && isset($_POST['cat_desc']) ) {



    $cat_desc1 = $_POST['cat_desc'];
    $cat_desc = htmlspecialchars($cat_desc1);

    $cat_name1 = $_POST['cat_name']; 
    $cat_name = htmlspecialchars($cat_name1);   

    $add_cat = mysql_query("insert into caterogies_table (cat_name,cat_desc) values ('$cat_name','$cat_desc')");

    if (isset($add_cat)) {

       

    }

}



?>

<div class="website_info_saved"><h2>تم اضافة المعلومات بنجاح</h2></div> 

<div class="cpanel-left">

    

    

    

</div>

<script src="../js/jquery-3.1.0.min.js"></script>

<script type="text/javascript">

    

$(function(){

    

    $('.cpanel-left').load('add-cat.php');



   $('.website_info_saved').slideDown();

   setTimeout(function () {

    $('.website_info_saved').slideUp();

    

    }, 2000);

    

   }

);

    

</script>