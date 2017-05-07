<?php include "cp-header.php";

?>
<!-- Cpanel-right-sec   -->
<?php include "cpanel-right.php"; ?> 
<!-- end right sec-->
<?php include "cpanel-left.php"; ?>  

<!--  End Work Area  -->    
<script src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/moviesstorm.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
     $(".button-collapse").sideNav();  
$(".dropdown-down").click(function () {
  
   $(this).$(".mobile-dropdown").slideToggle();
  
   
});
   $('.settings').click(function (){
        
       $('.cpanel-left').load('settings.php');
       
        
    });
    
    $('.support').click(function (){
        
       $('.cpanel-left').load('support.php'); 
        
    });
    $('.add-new').click(function (){
        
       $('.cpanel-left').load('add-new.php'); 
        
    });
    $('.reports').click(function (){
        
       $('.cpanel-left').load('reports.php'); 
        
    });
    $('.messages').click(function (){
        
       $('.cpanel-left').load('messages.php');
        
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
    
   
    $('.articles-section-container').load('all-articles.php table');
    
});
    
       $('.all-articles-load').click(function () {
        
       $('.cpanel-left').load('all-articles.php') ;
        
    });
    

    
    $('.add-new-page').click(function () {
        
       
        $('.cpanel-left').load('add-page.php .add-page-container');
        
    });
    $('.all-cat-load').click(function (){
        
       $('.cpanel-left').load('all-caterogies.php'); 
        
    });
    $('.all-pages-load').click(function (){
        
       
        $('.cpanel-left').load('all-pages.php');
        
    });
    
    $('.load-comments').click(function (){
        
       
        $('.cpanel-left').load('all-comments.php');
        
        
    });
    
    
    $('.all-mem-load').click(function (){
        
       $('.cpanel-left').load('all-users.php'); 
        
    });
    $('.add-new-cat').click(function (){
        
       $('.cpanel-left').load('add-cat.php') ;
        
    });
    

    
    $('.add-new-mem').click(function (){
        
       $('.cpanel-left').load('add-user.php'); 
        
    });
        $('.add-new-div').click(function () {
   
   $('.cpanel-left').load('add-div.php');
   
});
     $('.add-new-dropdown').click(function () {
   
   $('.cpanel-left').load('add-dropdown.php');
   
});
     
      $('.all-div-load').click(function () {
  
       $('.cpanel-left').load("all_divisions.php");
        
    });
            $('.securitylog').click(function () {
  
       $('.cpanel-left').load("security_log.php");
        
    });
     <?php
     

     
     ?>
   
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