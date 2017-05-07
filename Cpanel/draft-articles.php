<?php require "authorization.php"; ?>
<body>
      <table class="mytable" style="width:100%; direction:rtl;">
     <tr>
     <th style="font-size:10pt;">الرقم</th>
     <th style="width:25%;font-size:10pt;">الاسم</th>
     <th style="width:10%;font-size:10pt;">القسم</th>
     <th style="font-size:10pt;">تاريخ الحفظ</th>
     <th style="font-size:10pt;">نشر الموضوع</th>
     <th style="border-left:none; width:20%;font-size:10pt;">خصائص</th>     
         
     
     </tr>
     <?php
     require "../inc/config.php";
       if(!isset($_GET['page'])) {
  $page = 1;
   $y = 10;
  $x = ($page - 1) * $y;
}else if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $y = 10;
  $x = ($page - 1) * $y;
}

$shows_number = mysql_num_rows(mysql_query("select * from shows_table where show_structer='4'"));
$d_c = $shows_number/$y;
     $extract_draft = mysql_query("select * from shows_table where show_structer='4' order by id desc limit $x,$y");
     
     while ($draft = mysql_fetch_assoc($extract_draft)) {
          
          echo '
           <tr style="font-size:12pt;">
     <th style="font-size:12pt;">'.$draft['id'].'</th>
     <th style="width:25%;text-align:right;font-size:12pt;"><a style="color:white;">'.$draft['show_name'].'</a></th>
     <th style="font-size:12pt;width:15%">'.$draft['show_div'].'</th>
     <th style="font-size:12pt;">
    '.$draft['show_date'].'
    </th>
         <th> <div class="edit-article" style="width:100%;margin:0;"><a href="publish_draft.php?id='.$draft['id'].'"><h3>نشر الموضوع</h3></a></div></th>
     <th class="properties" style="border-left:none; width:20%;font-size:12pt;padding-right:5px;padding-left:0px;padding-top:20px">
         <div class="edit-article"><a href="editpost.php?id='.$draft['id'].'"><h3>تعديل</h3></a></div>
         
        <div class="edit-article"><a href="deletepost.php?id='.$draft['id'].'"> <h3>حذف</h3></a></div> 
        </th>     
         
     
     </tr>
          ';
          
     }
     
     
     ?>
    
    
     

    
    </table>
    
    

    
    
    
</div>
<div class="pagination">
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
      $(".articles-section-container").load("draft-articles.php?page=" + pagenumber);
        $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next-page").click(function () {
      
      page_c = $(this).attr("id") - 1;
      if (page_c <= 0) {
         page = 1;
      }else {
         page = $(this).attr("id") - 1;
      }
      $(".articles-section-container").load("draft-articles.php?page=" + page);
      $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next").click(function () {
        page_cc = $(this).attr("id");
   
       
      $(".articles-section-container").load("draft-articles.php?page=" + page_cc);
        $("html,body").animate({scrollTop:'25'});
   });
   
   
</script>