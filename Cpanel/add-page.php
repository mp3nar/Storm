<!DOCTYPE html>
 <?php require "authorization.php"; ?>
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
</style>
 </head>
<body>
<!-- Cpanel Header   -->
<div class="website_info_saved pageadded" style="   position: fixed;
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
    font-size: 17pt; font-family:DroidKufi;">تم اضافة الصفحة بنجاح</h2></div>
<div class="website_info_saved complete-data" style="   position: fixed;
    top: 0;
    width: 100%;
    height: auto;
    overflow: auto;
    left:0px;
    padding: 20px 15px 20px 15px;
    text-align: center;
    background-color:  #b51739;
    z-index: 9999999999999;
    display:none;"><h2
        style=" color: white;
    margin: 0;
    font-size: 17pt; font-family:DroidKufi;">الرجاء ملئ جميع البيانات </h2></div>

  <div class="add-page-container">
 <div class="head">
    <h4>اضافة صفحة</h4>
    </div>
      <div class="add-page-fields-container">
      <input type="text" placeholder="اسم الصفحة" class="page-name" />
      <textarea class='page-content' placeholder="محتوي الصفحة نص/شفرة" ></textarea>      
     <button class="add-page">نشر</button>
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

$(".add-page").click(function () {
 var pagename = $(".page-name").val();
var pagecontent = $(".page-content").val();
  if (pagename.length !== 0 && pagecontent.length !== 0) {
    $.ajax({
      url:'add_page_proccess.php',
      type:'POST',
      data: {name: pagename, content: pagecontent},
      success: function () {
        
        $('.pageadded').slideDown();
        setTimeout(function () {
           $('.pageadded').slideUp();
          }, 2000);
      }
      
      
    });
  }else {
    $('.complete-data').slideDown();
        setTimeout(function () {
           $('.complete-data').slideUp();
          }, 2000);
  }
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
  </body>
</html>    