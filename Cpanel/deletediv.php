<?php include "cp-header.php"; ?>
<?php include "cpanel-right.php"?>
<?php

$id = intval($_GET['id']);
$delete_div = mysql_query("delete from divs_table where id=".$id);
$delete_sub = mysql_query("delete from sub_divs_table where parent_id=".$id);
       


?>
<div class="website_info_saved"><h2>تم حذف القسم بنجاح</h2></div> 
<div class="cpanel-left">
    
    
    
</div>
<script src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
    
$(function(){
    
    $('.cpanel-left').load('all_divisions.php');

   $('.website_info_saved').slideDown();
   setTimeout(function () {
    $('.website_info_saved').slideUp();
    
    }, 2000);
    
   }
);
    
</script>