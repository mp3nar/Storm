<?php require "authorization.php"; ?>
<?php require "../inc/config.php"; ?>
<body>
     <table class="mytable" style="width:100%; direction:rtl;">
     <tr>
     <th style="font-size:10pt;">الرقم</th>
     <th style="width:25%;font-size:10pt;">الاسم</th>
     <th style="width:10%;font-size:10pt;">القسم</th>
     <th style="font-size:10pt;">نشر الموضوع</th>
     <th style="font-size:10pt;">عدد التنبيهات</th>
     <th style="border-left:none; width:20%;font-size:10pt;">خصائص</th>     
         
     
     </tr>
     
     <?php
      if(!isset($_GET['page'])) {
  $page = 1;
   $y = 10;
  $x = ($page - 1) * $y;
}else if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $y = 10;
  $x = ($page - 1) * $y;
}

$shows_number = mysql_num_rows(mysql_query("select * from shows_table where show_structer='3'"));
$d_c = $shows_number/$y;
     $extract_soon = mysql_query("select * from shows_table where show_structer='3' limit $x,$y");
     if(mysql_num_rows($extract_soon) < 1) {
  $hide_pagination = "none";
 }else {
  $hide_pagination = "block";
 } 
     while ($soon = mysql_fetch_assoc($extract_soon)) {
          
     $num_alerts = mysql_query("select * from alert_emails where alert_show_id=".$soon['id']);
     $num = mysql_num_rows($num_alerts);
     
     echo '
     
          <tr style="font-size:12pt;">
     <th style="font-size:12pt;">'.$soon['id'].'</th>
     <th style="width:25%;text-align:right;font-size:12pt;"><a style="color:white;">'.$soon['show_name'].'</a></th>
     <th style="font-size:12pt;width:15%">'.$soon['show_div'].'</th>
     <th style="font-size:12pt;">
    
         <div class="edit-article" style="width:100%;margin:0;"><a href="publishsoon.php?id='.$soon['id'].'"><h3>نشر الموضوع</h3></a></div>
    </th>
     <th style="font-size:12pt;">'.$num.'</th>
     <th class="properties" style="border-left:none; width:20%;font-size:12pt;padding-right:5px;padding-left:0px;padding-top:20px">
         <div class="edit-article"><a href="editpost.php?id='.$soon['id'].'"><h3>تعديل</h3></a></div>
         
        <div class="edit-article"><a href="deletepost.php?id='.$soon['id'].'"> <h3>حذف</h3></a></div> 
        </th>     
         
     
     </tr>
     
     ';
     
          
     }
     
     
     
     ?>

     
           
     
     
    
    
    
    </table>
    
    

    
    
    
</div>
<div class="pagination" style="display:<?php echo $hide_pagination; ?>">
 <a ><div class="next-page waves-effect waves-light z-depth-2" id="<?php echo $page; ?>"><h4>السابق</h4></div></a>
<?php
for($i= 0;$i<$d_c;$i++) {
  $j = $i + 1;
  echo '
  <a class="page" id="'.$j.'" ><div class="page-number waves-effect waves-light z-depth-2"><h4>'.$j.'</h4></div></a>
  ';
}


?>
 <a><div class="next waves-effect waves-light z-depth-2" id="<?php echo $page + 1; ?>" title="<?php echo $d_c; ?>"><h4>التالي</h4></div></a> 
</div>   
</div>
 <script src="js/jquery-3.1.0.min.js"></script>
<script>
   
  $(".page").click(function () {
   
      var pagenumber = $(this).attr("id");
      $(".articles-section-container").load("soon-articles.php?page=" + pagenumber);
        $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next-page").click(function () {
      
      page_c = $(this).attr("id") - 1;
      if (page_c <= 0) {
         page = 1;
      }else {
         page = $(this).attr("id") - 1;
      }
      $(".articles-section-container").load("soon-articles.php?page=" + page);
      $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next").click(function () {
        page_cc = $(this).attr("id");
   
      $(".articles-section-container").load("soon-articles.php?page=" + page_cc);
        $("html,body").animate({scrollTop:'25'});
   });
   
   
</script>