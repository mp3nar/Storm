<?php include "cp-header.php"; ?>
<?php include "cpanel-right.php"?>
<?php
$message_id = intval($_GET['id']);
$delete_message = mysql_query("DELETE from messages_table where id=".$message_id);


?>
<div class="website_info_saved"><h2>تم حذف الرسالة بنجاح</h2></div> 
<div class="cpanel-left">
    
    
    
</div>
<script src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
    
$(function(){
    
    $('.cpanel-left').load('messages.php');

   $('.website_info_saved').slideDown();
   setTimeout(function () {
    $('.website_info_saved').slideUp();
    
    }, 2000);
    
   }
);
    
</script>