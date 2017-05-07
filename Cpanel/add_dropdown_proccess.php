<?php include "cp-header.php"; ?>

<?php include "cpanel-right.php"?>

<?php



if(isset($_POST['sub_name']) && isset($_POST['main_div'])) {

    

    $sub_name1 = $_POST['sub_name'];
$sub_name = htmlspecialchars($sub_name1);

    $parent = $_POST['main_div'];

    $add_dropdown_name = mysql_query("UPDATE divs_table SET div_dropdown='yes' where id=".$parent);

    $add_dropdown_sub = mysql_query("insert into sub_divs_table (sub_name,parent_id) values('$sub_name','$parent')");

    

    if($add_dropdown_name = true && $add_dropdown_sub == true) {

        

    }else {

      

    }

}





?>

<div class="website_info_saved"><h2>تم اضافة المعلومات بنجاح</h2></div> 

<div class="cpanel-left">

    

    

    

</div>

<script src="../js/jquery-3.1.0.min.js"></script>

<script src='../js/moviesstorm.js'></script>

<script type="text/javascript">

    

$(function(){

    

    $('.cpanel-left').load('add-dropdown.php');



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