<?php require "authorization.php"; ?>

<?php



include "../inc/config.php";



// check if there any data to update





if( isset($_GET['name']) && isset($_GET['desc']) && isset($_GET['words']) && isset($_GET['statue']) ) {

    $name = $_GET['name'];

    $desc = $_GET['desc'];

    $words = $_GET['words'];

    $statue = $_GET['statue'];

    $file = $_FILES['logo']['name'];

    $update_website_info = mysql_query("UPDATE website_info SET website_name='$name', website_description='$desc', website_words='$words'

    ,website_statue='$statue',website_logo='$file'");

    

    if(isset($update_website_info)) {

        

        echo "done";

        

    }

}





///////////////////////////



// show info

$website_info = mysql_query('select * from website_info') or die('error');

$website_data_fetch = mysql_fetch_assoc($website_info);

?>

<div class="website_info_saved alert-copy" style='background-color: #b51739;'><h2>الرجاء ملئ جميع البيانات</h2></div> 

<div class="add-article-container">



    <div class="add-article-sec">

    <div class="add-article-sign"><h3>اعدادات الموقع</h3></div>

    <div class="information-container">

  <form action="website_info_proccess.php" method="post" enctype="multipart/form-data" id="form">      

       <div class="info">

        <h3>:اسم <span class="text">الموقع</span></h3>

           <input id='name' type='text' value="<?php echo htmlspecialchars($website_data_fetch['website_name']);  ?>" name="website_name"  />

    </div>



        <div class="info">

        <h3>:وصف <span class="text">الموقع</span></h3>

           <textarea id='desc' name="website_description"><?php echo $website_data_fetch['website_description'];  ?></textarea>

    </div>    

    <div class="info">

        <h3>:شعار الموقع</h3>

           <input type="file" class="upload-thumb" name="website_logo"  />

    </div>     

        <div class="info">

        <h3>:الكلمات المفتاحية </h3>

           <input id="words" type='text' value="<?php echo $website_data_fetch['website_words'];  ?>" name="website_words"  />

        </div>

        <div class="info">

        <h3>:السلايد شو</h3>

    <select class="options-site-info" name="slider_statue">  

  <option <?php if ($website_data_fetch['slider_statue'] == 1) {echo "selected";}  ?> value="1">اخر 10 مواضيع عادية</option>

  <option <?php if ($website_data_fetch['slider_statue'] == 2) {echo "selected";}  ?> value="2">اخر 10 مواضيع مثبتة</option>

  <option <?php if ($website_data_fetch['slider_statue'] == 3) {echo "selected";}  ?> value="3">اكثر 10 مواضيع مشاهدة</option>

  <option <?php if ($website_data_fetch['slider_statue'] == 4) {echo "selected";}  ?> value="4">اكثر 10 مواضيع اعجابا</option>

    </select>

        

        </div>

         <div class="info">

        <h3>:الاعلانات</h3>

    <select class="options-site-info" name="ads_statue">  

 <option <?php if ($website_data_fetch['ads_statue'] == 1) {echo "selected";}  ?> value="1">تشغيل</option>

 <option <?php if ($website_data_fetch['ads_statue'] == 2) {echo "selected";}  ?> value="2">ايقاف</option>

    </select>

        

        </div>      

             <div class="info">

        <h3>:عدد المواضيع في الصفحة الواحدة</h3>

           <input id='articles-number' type='text' value="<?php echo $website_data_fetch['articles_number'];  ?>" name="articles_number"  />

    </div>

            <div class="info">

        <h3>:حالة الموقع</h3>

    <select class="options-site-info" name="website_statue">  

    <option <?php if ($website_data_fetch['website_statue'] == 1) {echo "selected";}  ?> value="1">مفتوح</option>    

    <option <?php if ($website_data_fetch['website_statue'] == 2) {echo "selected";}  ?> value="2">مغلق</option>   

        

    </select>

        

        </div>

    </div>



       <button class="publish save-setting" name="send" >حفظ</button>

     </form> 

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

$('.publish').click(function () {

if ( $('#name').val().length == 0 || $('#desc').val().length == 0 || $('#words').val().length == 0) {

    $('.alert-copy').slideDown();

    setTimeout(function (){

        

        $('.alert-copy').slideUp();

        }, 2000);

 } else {

    

    $('#form').submit();

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