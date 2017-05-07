<?php include "cp-header.php"; ?>

<?php include "cpanel-right.php"?>

<?php



if(isset($_POST['div_name']) && isset($_POST['div_desc'])) {

    

    $div_name1 = $_POST['div_name'];
     $div_name = htmlspecialchars($div_name1);
    $div_desc1 = $_POST['div_desc'];
 $div_desc = htmlspecialchars($div_desc1);
    $add_div = mysql_query("insert into divs_table (div_name,div_desc,div_dropdown) values ('$div_name','$div_desc','no')");

    if ($add_div == true) {

       

    }else {

        

        

    }

}







?>

<div class="website_info_saved"><h2>تم اضافة المعلومات بنجاح</h2></div> 

<div class="cpanel-left">

    

    

    

</div>

<script src="../js/jquery-3.1.0.min.js"></script>

<script type="text/javascript">

    

$(function(){

    

    $('.cpanel-left').load('add-div.php');



   $('.website_info_saved').slideDown();

   setTimeout(function () {

    $('.website_info_saved').slideUp();

    

    }, 2000);

        $('.add-new-div').click(function () {

   

   $('.cpanel-left').load('add-div.php');

   

});

     $('.add-new-dropdown').click(function () {

   

   $('.cpanel-left').load('add-dropdown.php');

   

});

   }

   



);

    

</script>