<?php include "cp-header.php"; ?>
<?php include "cpanel-right.php"?>
<?php

$id = intval($_GET['id']);
$delete_cat = mysql_query("delete from caterogies_table where id=".$id);
       


?>
<div class="website_info_saved"><h2>تم حذف التصنيف بنجاح</h2></div> 
<div class="cpanel-left">
    
    
    
</div>
<script src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
    
$(function(){
    
    $('.cpanel-left').load('all-caterogies.php');

   $('.website_info_saved').slideDown();
   setTimeout(function () {
    $('.website_info_saved').slideUp();
    
    }, 2000);
    
   }
);
    
</script>