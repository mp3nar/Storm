<?php require "authorization.php"; ?>
<table style="width:100%; direction:rtl;">
    
     <tr>
     <th style="font-size:10pt;">الرقم</th>
     <th style="width:30%;font-size:10pt;">الاسم</th>
     <th style="width:10%;font-size:10pt;width:30%">الوصف</th>
     <th style="font-size:10pt;">النوع</th>
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

$shows_number = mysql_num_rows(mysql_query("select * from divs_table order by id desc"));
$d_c = $shows_number/$y;
          $extract_divs = mysql_query("select * from divs_table order by id desc limit $x,$y");
            if(mysql_num_rows($extract_divs) < 1) {
  $hide_pagination = "none";
 }else {
  $hide_pagination = "block";
 }
           while ($div = mysql_fetch_assoc($extract_divs)) {
            if ($div['div_dropdown'] == 'yes') {
                $statue = "قائمة منسدلة";
            }else if ($div['div_dropdown'] == 'no') {
                $statue = 'بدون قائمة منسدلة';
            }
            echo '
      <tr style="font-size:12pt;">
     <th style="font-size:12pt;">'.$div['id'].'</th>
     <th style="width:30%;text-align:right;font-size:12pt;"><a href="" style="color:white;">'.$div['div_name'].'</a></th>
     <th style="font-size:12pt;width:30%;">'.$div['div_desc'].'</th>
    <th style="font-size:10pt;">'.$statue.'</th>
     <th class="properties" style="border-left:none; width:30%;font-size:12pt;padding-right:5px;padding-left:0px;padding-top:20px">
        <div class="edit-article caterojy-edit"><a href="deletediv.php?id='.$div['id'].'"> <h3>حذف</h3></a></div> 
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
      $(".articles-section-container").load("all-divs-pagination.php?page=" + pagenumber);
        $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next-page").click(function () {
      
      page_c = $(this).attr("id") - 1;
      if (page_c <= 0) {
         page = 1;
      }else {
         page = $(this).attr("id") - 1;
      }
      $(".articles-section-container").load("all-divs-pagination.php?page=" + page);
      $("html,body").animate({scrollTop:'25'});
      
   });
   $(".next").click(function () {
        page_cc = $(this).attr("id");
  
       
      $(".articles-section-container").load("all-divs-pagination.php?page=" + page_cc );
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
   