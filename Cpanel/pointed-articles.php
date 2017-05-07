<?php require "authorization.php"; ?>
<?php require "../inc/config.php"; ?>
<body>
      <table class="mytable" style="width:100%; direction:rtl;">
     <tr>
     <th style="font-size:10pt;">الرقم</th>
     <th style="width:25%;font-size:10pt;">الاسم</th>
     <th style="width:10%;font-size:10pt;">القسم</th>
     <th style="font-size:10pt;">تاريخ النشر</th>
     <th style="font-size:10pt;">عدد المشاهدات</th>
     <th style="font-size:10pt;">عدد التعليقات</th>
     <th style="font-size:10pt;">عدد المعجبين</th>
     <th style="font-size:10pt;">عدد غير المعجبين</th>
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

$shows_number = mysql_num_rows(mysql_query("select * from shows_table where show_structer='2'"));
$d_c = $shows_number/$y;
     $extract_normal_shows = mysql_query("select * from shows_table where show_structer='2' order by id desc limit $x,$y");
    if(mysql_num_rows($extract_normal_shows) < 1) {
  $hide_pagination = "none";
 }else {
  $hide_pagination = "block";
 }  
     while ($normal_show = mysql_fetch_assoc($extract_normal_shows)) {
      $num_comments = mysql_query("select * from comments_table where parent_id=".$normal_show['id']);
      $num_comm = mysql_num_rows($num_comments);
      echo '
           <tr style="font-size:12pt;">
     <th style="font-size:12pt;">'.$normal_show['id'].'</th>
     <th style="width:25%;text-align:right;font-size:12pt;"><a href="../movie.php?id='.$normal_show['id'].'" target="_blank" style="color:white;">'.$normal_show['show_name'].'</a></th>
     <th style="font-size:12pt;width:15%">'.$normal_show['show_div'].'</th>
     <th style="font-size:12pt;">'.$normal_show['show_date'].'</th>
     <th style="font-size:12pt;">'.$normal_show['show_views'].'</th>
     <th style="font-size:12pt;">'.$num_comm.'</th>
     <th style="font-size:12pt;">'.$normal_show['show_likes'].'</th>
     <th style="font-size:12pt;">'.$normal_show['show_dislikes'].'</th>
     <th class="properties" style="border-left:none; width:20%;font-size:12pt;padding-right:5px;padding-left:0px;padding-top:20px">
         <div class="edit-article"><a href="editpost.php?id='.$normal_show['id'].'"><h3>تعديل</h3></a></div>
         
        <div class="edit-article"><a href="deletepost.php?id='.$normal_show['id'].'"> <h3>حذف</h3></a></div> 
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
      $(".articles-section-container").load("pointed-articles.php?page=" + pagenumber);
        $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next-page").click(function () {
      
      page_c = $(this).attr("id") - 1;
      if (page_c <= 0) {
         page = 1;
      }else {
         page = $(this).attr("id") - 1;
      }
      $(".articles-section-container").load("pointed-articles.php?page=" + page);
      $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next").click(function () {
        page_cc = $(this).attr("id");
   
       
      $(".articles-section-container").load("pointed-articles.php?page=" + page_cc);
        $("html,body").animate({scrollTop:'25'});
   });
   
   
</script>