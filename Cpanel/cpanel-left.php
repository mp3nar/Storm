<?php require "../inc/config.php";

$check_show = mysql_query("select * from shows_table");
$shows_num = mysql_num_rows($check_show);

if($shows_num > 0 ) {
 $hide_l = "block";
}else {
 $hide_l = "none";
}

?>
<?php require "authorization.php"; ?>
<div class="cpanel-left">
    
 <div class="home">
<div class="quickview z-depth-2">
 <div class="head">
    <h4>نظرة سريعة</h4>
    </div>
    <div class="home-sections">
    <div class="home-sec z-depth-3 home-sec-media">
     <img src="images/chart.png" />
             <h2>
                  <?php
              
              $total_views_extract = mysql_query('SELECT SUM(show_views) AS value_sum2 FROM shows_table'); 
              $total_views = mysql_fetch_assoc($total_views_extract);
              echo $total = $total_views['value_sum2'];
              
              
              ?>
             </h2>
             <div class="sec-info">
             <h3>عدد مشاهدات المواضيع</h3>
             </div>
     </div>
     <div class="home-sec z-depth-3 home-sec-media">
      <img src="images/chart.png" />
             <h2>
                          <?php
              
             $home_views_extract = mysql_query("select * from website_info");
             $home_views = mysql_fetch_assoc($home_views_extract);
             echo $home_views['home_views'];
              
              
              ?>
              
             </h2>
             <div class="sec-info">
             <h3>عدد مشاهدات الصفحة الرئيسية</h3>
             </div>
     </div>
     <div class="home-sec z-depth-3 home-sec-media">
      <img src="images/chart.png" />

             <h2><?php
      $weekshow_views_extract = mysql_query("select * from website_info");
             $weekshow_views = mysql_fetch_assoc($weekshow_views_extract);
             echo $weekshow_views['week_show_views']; 
      ?></h2>
             <div class="sec-info">
             <h3>عدد مشاهدات العرض الاسبوعي</h3>
             </div>
     </div>
         <div class="home-sec z-depth-3 sp1 sp2 home-sec-media">
     <img src="images/comments-icon.png" />
             <h2>  <?php
              
              $comments_num = mysql_query("select * from comments_table");
              
              echo mysql_num_rows($comments_num);
              
              
              ?></h2>
             <div class="sec-info">
             <h3>عدد التعليقات الاجمالي</h3>
             </div>
     </div>
     <div class="home-sec z-depth-3 sp1 home-sec-media">
      <img src="images/cp-like-icon.png" />
             <h2>
              <?php
              
              $total_likes_extract = mysql_query('SELECT SUM(show_likes) AS value_sum FROM shows_table'); 
              $total_likes = mysql_fetch_assoc($total_likes_extract);
              echo $total = $total_likes['value_sum'];
              
              
              ?>
              
             </h2>
             <div class="sec-info">
             <h3>عدد الاعجابات الاجمالي</h3>
             </div>
     </div>
     <div class="home-sec z-depth-3 sp1 sp3 home-sec-media">
      <img src="images/cp-unlike-icon.png" />
             <h2>
                 <?php
              
              $total_dislikes_extract = mysql_query('SELECT SUM(show_dislikes) AS value_sum_dislikes FROM shows_table'); 
              $total_dislikes = mysql_fetch_assoc($total_dislikes_extract);
              echo $total2 = $total_dislikes['value_sum_dislikes'];
              
              
              ?>
             </h2>
             <div class="sec-info">
             <h3>عدد عدم الاعجاب الكلي</h3>
             </div>
     </div>
    
    </div>
 
</div>
     
     <div class="quickview activity">
 <div class="head">
    <h4>النشاط</h4>
    </div>
    <div class="home-sections media-home-sections">
        <div class="activity-right">
        
        
            <div class="activity-sec home-sec z-depth-3">
  <div class="last-post-sign">
        <h3>نشر حديثا</h3>
        </div>
      <?php
         $extract_last_post = mysql_query("select * from shows_table order by id desc limit 1");
         $last_post = mysql_fetch_assoc($extract_last_post);
         
      
         
         
         ?>
        <div class="last-post sp-6 bg-comm-home sp-7" style="display:<?php echo $hide_l; ?>">
        <a href="../movie.php?id=<?php echo $last_post['id']; ?>" target="_blank"><h3><?php  echo $last_post['show_name']; ?>
        </h3></a>
        </div>
     </div>
    <div class="recent-comments-container">
            <div class="activity-sec home-sec z-depth-3 recent-comments">
  <div class="last-post-sign">
        <h3>احدث التعليقات</h3>
        </div>
  <?php
  
  $extract_last_comments = mysql_query("select * from comments_table order by id desc limit 4");
  while ($last_comment = mysql_fetch_assoc($extract_last_comments)) {
   echo '
   <div class="last-post bg-comm-home">
        <a href="../movie.php?id='.$last_comment['parent_id'].'&&show_comments=yes"><h3>'.$last_comment['comment_content'].'</h3></a>
        </div>
   
   ';
  }
  
  
  ?>
        
     </div>
        
        
        </div>

        </div>
        <div class="activity-left">
                  <div class="recent-comments-container">
            <div class="home-sec z-depth-3 activity-sec top-articles-home">
  <div class="last-post-sign">
        <h3>افضل المواضيع من حيث المشاهدة</h3>
        </div>
  
  <?php
  
  $get_top_posts = mysql_query("select * from shows_table ORDER BY show_likes desc limit 6");
  while ($top_post = mysql_fetch_assoc($get_top_posts)) {
   $show_name = substr($top_post['show_name'], 1 , 50);
   echo '
    <div class="home-article">
       <div class="home-movie-name movie-name-h">
     <a href="../movie.php?id='.$top_post['id'].'" style="direction:rtl;"><h3 style="direction:rtl;">'.$show_name.'</h3></a>
     </div>
       <div class="home-movie-name views-home-article">
     <h3><span>مشاهدة</span>'.$top_post['show_likes'].'</h3>
     </div>
</div>
   
   ';
  }
  
  ?>

                 
     </div>
        </div>
        
        </div>
        
  
    
    </div>
 
</div>
</div>
    
</div>
<?php

if (@$_GET['load'] == "addnew" && @$_GET['error'] == "fileupload") {
     echo '
     <script src="../js/jquery-3.1.0.min.js"></script>
     <script>
     $(".cpanel-left").load("add-new.php?error=fileupload"); 
     </script>
     ';
    

}

     if (@$_GET['load'] == "addnew" && @$_GET['proccess'] == "success") {
     echo '
     <script src="../js/jquery-3.1.0.min.js"></script>
     <script>
     $(".cpanel-left").load("add-new.php?proccess=success"); 
     </script>
     ';
    
}

     if (@$_GET['load'] == "allarticles" && @$_GET['proccess'] == "updatesuccess") {
     echo '
     <script src="../js/jquery-3.1.0.min.js"></script>
     <script>
     $(".cpanel-left").load("all-articles.php?proccess=updatesuccess"); 
     </script>
     ';
    
}

     if (@$_GET['load'] == "allarticles" && @$_GET['proccess'] == "deletesuccess") {
     echo '
     <script src="../js/jquery-3.1.0.min.js"></script>
     <script>
     $(".cpanel-left").load("all-articles.php?proccess=deletesuccess"); 
     </script>
     ';
    
}
     if (@$_GET['load'] == "allarticles" && @$_GET['proccess'] == "publishsuccess") {
     echo '
     <script src="../js/jquery-3.1.0.min.js"></script>
     <script>
     $(".cpanel-left").load("all-articles.php?proccess=publishsuccess"); 
     </script>
     ';
    
}

if (@$_GET['load'] == "addnew" && @$_GET['proccess'] == "successdraft") {
     echo '
     <script src="../js/jquery-3.1.0.min.js"></script>
     <script>
     $(".cpanel-left").load("add-new.php?proccess=draftadded"); 
     </script>
     ';
    
}

?>