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
 .add-more-sub-list {
    position: absolute;
    left: 20px;
    top:20px;
    cursor:pointer;
    display: none;
 }
 .add-page-container {
    position: relative;
 }
 .sub-container {
    display: none;
 }
 .choose-div {
    display: none;
 }
 select {
  margin-right: 3px;
  margin-bottom: 20px;
 }
</style>
 </head>
<body>
  <div class="website_info_saved alert-copy" style='background-color: #b51739;'><h2>الرجاء ملئ جميع البيانات</h2></div>  
  <div class="add-page-container">
 <div class="head">
    <h4>اضافة قائمة منسدلة</h4>
    </div>
      <div class="add-page-fields-container">
          <div class="information-container">
           <div class="info cat-thing">
   

  
        
        </div>
          </div>
                  <form action='add_dropdown_proccess.php' method='post' id="add_cat">
          <div class="fields-cat">
           <select name="main_div" id="select-main">
            <option selected disabled>الرجاء اختيار قسم</option>
            <?php
            include "../inc/config.php";
            $divs = mysql_query("select * from divs_table");
            
            while ($fetch_divs = mysql_fetch_assoc($divs)) {
                echo "
                <option value='".$fetch_divs['id']."' >".$fetch_divs['div_name']."</option>
                ";
                
            }
            
            
            ?>
            
            
           </select>
       <input type="text" class='sub-name' name="sub_name" placeholder="العنصر الفرعي" />

          </div>
        
      </form>
      <button class='add_cat_proccess'>حفظ القائمة</button>
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
  
  if ($('#select-main').val() <= 0 || $('.sub-name').val().length == 0 ) {
   $('.alert-copy').slideDown();
    setTimeout(function (){
        $('.alert-copy').slideUp();
        }, 2000);
  } else {
   $('#add_cat').submit();
  }
   
    
   
  
   
}); 
   
$('select2').attr('style','margin-right:3px,margin-bottom:20px');


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