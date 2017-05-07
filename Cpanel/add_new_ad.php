<?php require "authorization.php"; ?>
<!DOCTYPE html>
<html lang="en">
 <head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/Logo.png" />   
<link href="../css/animate.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
<link rel="stylesheet" href="../css/materliaze-rtl.css" />
<link rel="stylesheet" href="../css/font-awesome.min.css" />
<script src="../js/html5shiv.min.js"></script>
<script src="../js/respond.min.js"></script>
<link href="../css/select2.min.css" rel="stylesheet">     
<link href="cpanel-style.css" rel="stylesheet">
<link href="Cpanel-media.css" rel="stylesheet">
<style>
    .set-dropdown {
  display: none;
 }
 .select2 {
   width: 100%;
 }
 label {
  color:white;
  float:right;
  font-size:12pt;
  margin-bottom: 8px;
 }
</style>
 </head>
<body>
   <div class="website_info_saved alert-copy" style='background-color: #b51739;'><h2>الرجاء ملئ جميع البيانات</h2></div>  
  <div class="add-page-container">
 <div class="head">
    <h4>اضافة اعلان جديد</h4>
    </div>
      <div class="add-page-fields-container">
          <div class="information-container">
           <div class="info cat-thing">
   
   
    
        
        </div>
          </div>
                  <form action='add_ad_proccess.php' enctype="multipart/form-data" method='post' id="add_cat">
          <div class="fields-cat">
   
           <input type="text" class='ad-name' name='ad_name' placeholder="اسم الاعلان" />
       <input type="text" class='ad-link2' name="ad_link" placeholder="رابط الاعلان" />
      
        <label>:صورة الاعلان</label>
           <input type="file" name="ad_img" style="margin-right:2px;" class="ad-img2" accept="image/*"/>
   
 
          </div>
        
     
      </form>
      <button class='add_cat_proccess'>اضافة الاعلان</button>
      </div>
      
    
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


 
 $('.add_cat_proccess').click(function () {
  
   if ($('.ad-name').val().length == 0 || $('.ad-link2').val().length == 0 || $('.ad-img2').val().length == 0 ) {
    $('.alert-copy').slideDown();
    setTimeout(function (){
        $('.alert-copy').slideUp();
        }, 2000);
   } else {
    
     $('#add_cat').submit();
   }
  
   
}); 
   


});    
</script>    
<script src="js/wow.min.js"></script>
<script>
new WOW().init();  
</script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/select2.full.min.js"></script>
<script type="text/javascript">
    $(".multi").select2({dir:'rtl'});
    $(".dropdown-user").select2({
  tags: true,
dir:'rtl',        
    formatNoMatches: function() {
        return '';
    },
    dropdownCssClass: 'select2-hidden'
});
</script> 
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
  </body>
</html>    