<?php require "authorization.php"; ?>

<?php



include "../inc/config.php";

$weekshow_info = mysql_query("select * from weekshow");

$weekshow_data = mysql_fetch_assoc($weekshow_info);



?>

<div class="website_info_saved alert-copy" style='background-color: #b51739;'><h2>الرجاء ملئ جميع البيانات</h2></div> 

<div class="add-article-container">



    <div class="add-article-sec">

    <div class="add-article-sign"><h3>اعدادات العرض الاسبوعي</h3></div>

    <div class="information-container">

  <form action="show_week_proccess.php" method="post" enctype="multipart/form-data" id="form">

                <div class="info">

        <h3>:حالة العرض الاسبوعي</h3>

    <select class="options-site-info" name="weekshow_statue">  

    <option <?php if ($weekshow_data['weekshow_statue'] == 1) {echo "selected";}  ?> value="1">يعمل</option>    

    <option <?php if ($weekshow_data['weekshow_statue'] == 2) {echo "selected";}  ?> value="2">مغلق</option>   

        

    </select>

        

        </div>

       <div class="info info2">

        <h3>:اسم العرض</h3>

           <input id='name' type='text' value="<?php echo htmlspecialchars($weekshow_data['weekshow_name']); ?>" name="weekshow_name"  />

    </div>



        <div class="info info2">

        <h3>:قصة العرض</span></h3>

           <textarea id='desc' name="weekshow_story"><?php echo htmlspecialchars($weekshow_data['weekshow_story']); ?></textarea>

    </div>    

    <div class="info info2">

        <h3>:صورة العرض</h3>

           <input type="file" class="upload-thumb" name="weekshow_img"  />

    </div>

       <div class="info info2">

        <h3>:كود المشاهدة</h3>



           <textarea id='code' name="weekshow_src"><?php echo $weekshow_data['weekshow_src']; ?></textarea>

    </div>

       



       

     </form>

  <button class="publish save-setting" name="send" >حفظ</button>

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

   if($('.options-site-info').val() == 2) {

        $(".information-container .info2").addClass("disabled");

        

    }else if ($('.options-site-info').val() == 1) {

        $(".information-container .info2").removeClass("disabled");

    }

$('.publish').click(function () {

if ( $('#name').val().length == 0 || $('#desc').val().length == 0 || $('#code').val().length == 0 ) {

    $('.alert-copy').slideDown();

    setTimeout(function (){

        

        $('.alert-copy').slideUp();

        }, 2000);

 } else {

    

    $('#form').submit();

 }



   

}); 



$(".options-site-info").change(function () {

    

     if($('.options-site-info').val() == 2) {

        $(".information-container .info2").addClass("disabled");

        

    }else if ($('.options-site-info').val() == 1) {

        $(".information-container .info2").removeClass("disabled");

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