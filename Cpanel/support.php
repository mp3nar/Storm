<?php require "authorization.php"; ?>
<div class="website_info_saved messagesent" style="   position: fixed;
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
    font-size: 17pt; font-family:DroidKufi;">تم ارسال رسالتك بنجاح,سنتواصل معك عبر ايميلك قريبا</h2></div>    
<div class="add-article-container">

    <div class="add-article-sec">
    <div class="add-article-sign"><h3>الدعم الفني</h3></div>
    <div class="information-container support-sec">
    <div class="support-info">
        <p>
مرحبا بك عزيزي العميل هذا القسم مخصص للدعم الفني لهذا الاسكربت لذلك اذا كانت تواجهك اي 
مشاكل تقنية في الاسكربت او استفسار او اي تعديلات تريد اجرائها قم بتعبئة النموذج ادناه وسوف يتم تحويل مشكلتك الينا وسوف نتواصل معك باسرع وقت ممكن 
        </p>
        
        
        </div>
<div class="support-form">
<input type='text' placeholder='اسمك الكريم' class="client-name"  />
<input type="text" placeholder="بريدك الالكتروني" class="client-email" />
<textarea placeholder="نص رسالتك" class="client-message"></textarea>   
  <button class="send">ارسال</button>      
</div>        
       
        
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
$(".send").click(function () {
    
   var name = $(".client-name").val();
   email = $(".client-email").val();
   message = $(".client-message").val();
   $.ajax({
    
    url:"support_message_proccess.php",
    type:"post",
    data:{name: name, email: email, message: message},
    success: function (data) {

      $(".messagesent").slideDown();
 setTimeout(function () {
  
  $(".messagesent").slideUp();
 }, 2000);
       
    }
    
    
    
   });
   
    
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
</html>    