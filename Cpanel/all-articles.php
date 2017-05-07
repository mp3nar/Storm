<?php require "authorization.php"; ?>
<?php require "../inc/config.php"; ?>
<style>
 .articles-search {
     float: left;
    width: auto;
    height: auto;
    padding: 12px;
  background-color: white;
}


    
</style>
<body>
<div class="website_info_saved postupdated" style="   position: fixed;
    top: 0;
    width: 100%;
    height: auto;
    overflow: auto;
    left:0px;
    padding: 20px 15px 20px 15px;
    text-align: center;
    background-color: #33d2fd;
    z-index: 9999999999999;
    display:none;"><h2
        style=" color: white;
    margin: 0;
    font-size: 17pt; font-family:DroidKufi;">تم تحديث الموضوع بنجاح</h2></div>

<div class="website_info_saved postdeleted" style="   position: fixed;
    top: 0;
    width: 100%;
    height: auto;
    overflow: auto;
    left:0px;
    padding: 20px 15px 20px 15px;
    text-align: center;
    background-color: #33d2fd;
    z-index: 9999999999999;
    display:none;"><h2
        style=" color: white;
    margin: 0;
    font-size: 17pt; font-family:DroidKufi;">تم حذف الموضوع بنجاح</h2></div>

<div class="website_info_saved publish-success" style="   position: fixed;
    top: 0;
    width: 100%;
    height: auto;
    overflow: auto;
    left:0px;
    padding: 20px 15px 20px 15px;
    text-align: center;
    background-color: #33d2fd;
    z-index: 9999999999999;
    display:none;"><h2
        style=" color: white;
    margin: 0;
    font-size: 17pt; font-family:DroidKufi;">تم نشر الموضوع بنجاح</h2></div>


<?php

if(@$_GET['proccess'] == "updatesuccess") {
 echo '
 <script src="../js/jquery-3.1.0.min.js"></script>
<script>
$(function () {

 $(".postupdated").slideDown();
 setTimeout(function () {
  
  $(".postupdated").slideUp();
 }, 2000);

});
</script>
 ';
} else if (@$_GET['proccess'] == "deletesuccess") {
    
     echo '
 <script src="../js/jquery-3.1.0.min.js"></script>
<script>
$(function () {

 $(".postdeleted").slideDown();
 setTimeout(function () {
  
  $(".postdeleted").slideUp();
 }, 2000);

});
</script>
 ';
} else if (@$_GET['proccess'] == "publishsuccess") {
    
     echo '
 <script src="../js/jquery-3.1.0.min.js"></script>
<script>
$(function () {

 $(".publish-success").slideDown();
 setTimeout(function () {
  
  $(".publish-success").slideUp();
 }, 2000);

});
</script>
 ';
} 

?>
    
<div class="all-articles-container">
 <div class="add-article-sign"><h3>جميع المواضيع</h3></div>
 <input type="search" class="articles-search"
 placeholder="ابحث في المواضيع" style="background-color: white; float:left; width:400px;padding:2px 10px 0px 10px;"  />
 <div class="articles-sorts-container">
  <div class="sort standerd scrollToCon2"><h3>(<?php
    $extract_normal_shows = mysql_query("select * from shows_table where show_structer='1' order by id desc");
    echo mysql_num_rows($extract_normal_shows);?>) عادي</h3></div>
<div class="sort pointed-cpanel scrollToCon2"><h3>(<?php
    $extract_pointed_shows = mysql_query("select * from shows_table where show_structer='2' order by id desc");
    echo mysql_num_rows($extract_pointed_shows);?>) مثبت</h3></div>
     <div class="sort soon-cpanel scrollToCon2"><h3>(<?php
    $extract_soon_shows = mysql_query("select * from shows_table where show_structer='3' order by id desc");
    echo mysql_num_rows($extract_soon_shows);?>) قريبا</h3></div>
     <div class="sort draft-cpanel scrollToCon2"><h3>(<?php
    $extract_draft_shows = mysql_query("select * from shows_table where show_structer='4' order by id desc");
    echo mysql_num_rows($extract_draft_shows);?>) مسودة</h3></div> 
    
</div>
<div class="articles-section-container">

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

$shows_number = mysql_num_rows(mysql_query("select * from shows_table where show_structer='1'"));
$d_c = $shows_number/$y;
 $extract_normal_shows = mysql_query("select * from shows_table where show_structer='1' order by id desc limit $x,$y");
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
    
    

    
    
   <div class="pagination" style="display:<?php echo $hide_pagination; ?>">
 <a ><div class="next-page waves-effect waves-light" id="<?php echo $page; ?>"><h4>السابق</h4></div></a>
<?php
for($i= 0;$i<$d_c;$i++) {
  $j = $i + 1;
  echo '
  <a class="page" id="'.$j.'" ><div class="page-number waves-effect waves-light z-depth-3"><h4>'.$j.'</h4></div></a>
  ';
}


?>
 <a><div class="next waves-effect waves-light" id="<?php echo $page + 1; ?>" title="<?php echo $d_c; ?>"><h4>التالي</h4></div></a> 
</div>   
</div>    
    
    
    
<!--  End Work Area  -->    
<script src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/moviesstorm.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
     $(".button-collapse").sideNav();  
$(".dropdown-down").click(function () {
  
   $(".mobile-dropdown").slideToggle();
  
   
});
    $(".pointed-cpanel").click(function () {
    
   
    $('table').load('pointed-articles.php');
    
});

    $(".soon-cpanel").click(function () {
    
   
    $('table').load('soon-articles.php');
    
}); 
    $(".draft-cpanel").click(function () {
    
   
    $('table').load('draft-articles.php');
    
}); 
        $(".standerd").click(function () {
    
   
    $('.articles-section-container').load('recent_cp.php');
    
});
      
$('.articles-search').keypress(function (e) {
  if (e.which == 13 && $(".articles-search").val().length !== 0 ) {
   $(".pagination").hide();
    var keysearch = $('.articles-search').val();
    $.ajax({
     url:"search_articles.php",
     type:"POST",
     data: {word: keysearch},
     success: function (data) {
        $(".mytable").html(data);
     }
        
        
    });
    return false;    //<---- Add this line
  }
});


 

 if ($(window).width() <= 930) {
    $('.articles-search').attr("style","float:right;  width: 90%; margin-right:5px; margin-top:40px; height: auto;padding: 12px;background-color: white;");
 }
 $(".articles-section-container").animate({scrollLeft:"2000000"});
});
$(".page").click(function () {
   
      var pagenumber = $(this).attr("id");
      $(".articles-section-container").load("recent_cp.php?page=" + pagenumber);
        $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next-page").click(function () {
      
      page_c = $(this).attr("id") - 1;
      if (page_c <= 0) {
         page = 1;
      }else {
         page = $(this).attr("id") - 1;
      }
      $(".articles-section-container").load("recent_cp.php?page=" + page);
      $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next").click(function () {
        page_cc = $(this).attr("id");
 
       
      $(".articles-section-container").load("recent_cp.php?page=" + page_cc);
        $("html,body").animate({scrollTop:'25'});
   });
</script>    
<script src="js/wow.min.js"></script>
<script>
new WOW().init();  
</script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript">
    
   
        
  $('.slideshow-items').slick({
  infinite: true,
  slidesToShow: 6,
  centerMode: true,
  variableWidth: true,
  speed: 600,
  autoplay: true,
  autoplaySpeed: 1000,
 prevArrow:$('#prev'),
  nextArrow:$('#next'),
}); 
 </script>
<script type="text/javascript" src="../js/select2.full.min.js"></script>
<script type="text/javascript">
    $(".multi").select2({dir:'rtl'});
    $(".cast").select2({
  tags: true,
dir:'rtl',        
    formatNoMatches: function() {
        return '';
    },
    dropdownCssClass: 'select2-hidden'
});

    

</script>    
    
  </body>
   