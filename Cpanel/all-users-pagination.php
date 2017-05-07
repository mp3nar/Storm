<?php require "authorization.php"; ?>
<table style="width:100%; direction:rtl;">
    
     <tr>
     <th style="font-size:10pt;">اسم العضو</th>
     <th style="width:20%;font-size:10pt;">اسم المستخدم</th>
     <th style="width:10%;font-size:10pt;">البريد الالكتروني</th>
     <th style="font-size:10pt;">كلمة السر</th>
     <th style="font-size:10pt;">الصلاحية</th>
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

$shows_number = mysql_num_rows(mysql_query("select * from users_table order by id desc"));
$d_c = $shows_number/$y;
     $extract_users = mysql_query("select * from users_table order by id desc limit $x,$y");
       if(mysql_num_rows($extract_users) < 1) {
  $hide_pagination = "none";
 }else {
  $hide_pagination = "block";
 }
      while ($user = mysql_fetch_assoc($extract_users)) {
       if (@$_SESSION['login'] == $user['user_name']) {
        $style = "none";
       }else {
        $style = "block";
       }
       @$user_current = $_SESSION['login'];
       $get_auth_data = mysql_query("select * from users_table where user_name='$user_current'");
       $fetch_auth = mysql_fetch_assoc($get_auth_data);
       $auth_current = $fetch_auth['authorization'];
 
       if ($auth_current !== "manager" && $user['authorization'] == "manager") {
        $hide_manager = "none";
       }else {
        $hide_manager = "table-row";
       }
       echo '
            <tr style="display:'.$hide_manager.'">
     <th style="font-size:10pt;">'.$user['name'].'</th>
     <th style="width:20%;font-size:10pt;">'.$user['user_name'].'</th>
     <th style="width:10%;font-size:10pt;">'.$user['user_email'].'</th>
     <th style="font-size:10pt;">'.$user['user_password'].'</th>
     <th style="font-size:10pt;">'.$user['authorization'].'</th>
   
          <th class="properties" style="border-left:none; width:30%;font-size:12pt;padding-right:5px;padding-left:0px;padding-top:20px">
         
        <div class="edit-article users-edit" style="display:'.$style.'"><a href="editmember.php?id='.$user['id'].'"> <h3>تعديل</h3></a></div> 
        <div class="edit-article users-edit" style="display:'.$style.'"><a href="deletemember.php?id='.$user['id'].'"> <h3>حذف</h3></a></div> 
        </th>  
     
     </tr>
       
       
       
       ';
      }
     
     
     
     
     ?>

         
          
     

     
     
    
    
    
    </table>
    
    

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
$(".page").click(function () {
   
      var pagenumber = $(this).attr("id");
      $(".articles-section-container").load("all-users-pagination.php?page=" + pagenumber);
        $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next-page").click(function () {
      
      page_c = $(this).attr("id") - 1;
      if (page_c <= 0) {
         page = 1;
      }else {
         page = $(this).attr("id") - 1;
      }
      $(".articles-section-container").load("all-users-pagination.php?page=" + page);
      $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next").click(function () {
        page_cc = $(this).attr("id");
     
       
      $(".articles-section-container").load("all-users-pagination.php?page=" + page_cc );
        $("html,body").animate({scrollTop:'25'});
   });
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
   