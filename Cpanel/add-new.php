<?php require "../inc/config.php"; ?>
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
 
 .select2 {
  margin-bottom: 20px;
 }
 .cpanel-left {
  min-height: 2576px;
 }

</style>
 </head>
<body>
<!-- Cpanel Header   -->
<div class="website_info_saved file-upload-error" style="   position: fixed;
    top: 0;
    width: 100%;
    height: auto;
    overflow: auto;
    left:0px;
    padding: 20px 15px 20px 15px;
    text-align: center;
    background-color: #b51739;
    z-index: 9999999999999;
    display:none;"><h2
        style=" color: white;
    margin: 0;
    font-size: 17pt; font-family:DroidKufi;">الرجاء رفع ملفات الصور فقط,لا يسمح برفع ملفات اخري</h2></div>
<div class="website_info_saved postuploaded" style="   position: fixed;
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
    font-size: 17pt; font-family:DroidKufi;">تم نشر الموضوع بنجاح</h2></div>

<div class="website_info_saved draftadded" style="   position: fixed;
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
    font-size: 17pt; font-family:DroidKufi;">تم حفظ المسودة بنجاح</h2></div>
<?php
if (@$_GET['error'] == "fileupload") {
 echo '
<script>
$(function () {

 $(".file-upload-error").slideDown();
 setTimeout(function () {
  
  $(".file-upload-error").slideUp();
 }, 2000);

});
</script>
 ';
 $security_statue = "محاولة رفع ملف غير مصرح به";
 $security_statue_date = date("d/m/Y h:i a", time());
 $log_statue = mysql_query("insert into security_log (security_statue,security_date) values('$security_statue','$security_statue_date')");
}

if (@$_GET['proccess'] == "success") {
  echo '
<script>
$(function () {

 $(".postuploaded").slideDown();
 setTimeout(function () {
  
  $(".postuploaded").slideUp();
 }, 2000);

});
</script>
 ';
} else if (@$_GET['proccess'] == "draftadded") {
  echo '
 <script src="../js/jquery-3.1.0.min.js"></script>
<script>
$(function () {

 $(".draftadded").slideDown();
 setTimeout(function () {
  
  $(".draftadded").slideUp();
 }, 2000);

});
</script>
 ';
}


?>
<div class="add-article-container">

    <div class="add-article-sec">
    <div class="add-article-sign"><h3>اضافة موضوع</h3></div>
    <div class="information-container">

     <form action="add_show_proccess.php" enctype="multipart/form-data" method="post" id="addshow">
          <div class="info">
        <h3>:نوع الموضوع</h3>
   
    <select class="options" name="show_sort">
    <option disabled selected >الرجاء اختيار نوع</option>    
    <option value="1">فيلم</option>    
    <option value="2">مسلسل</option>    
    <option value="3">برنامج</option>  
    <option value="4">مسرحية</option>  
        
    </select>
        
        </div>
   <div class="info">
        <h3>:قسم <span class="text">الموضوع</span></h3>
         
          <select name="show_div">
   <?php
   $get_website_divs = mysql_query("select * from divs_table");
   $get_website_sub_divs = mysql_query("select * from sub_divs_table");
   
   while ( $extract_divs5 = mysql_fetch_assoc($get_website_divs) ) {
    
    echo "<option value='".$extract_divs5['div_name']."'>".$extract_divs5['div_name']."</option>";
    
   }
   
      while ( $extract_sub_divs = mysql_fetch_assoc($get_website_sub_divs) ) {
    
    echo "<option value='".$extract_sub_divs['sub_name']."'>".$extract_sub_divs['sub_name']."</option>";
    
   }
 
   
   ?>
        
    </select>
    </div> 
       <div class="info disabled">
        <h3>:اسم <span class="text">الموضوع</span></h3>
           <input type='text' name='show_name'  />
    </div> 
        <div class="info disabled">
        <h3>:قصة <span class="text">الموضوع</span></h3>
           <textarea name="show_story"></textarea>
    </div>
  
    <div class="info disabled">
        <h3>:رسالة/تنبيه </h3>
           <input type='text' placeholder="رسالة سوف توجد علي غلاف الموضوع (اختياري)" name="show_special_message"  />
        </div>
    
    <div class="info disabled">
        <h3>:الصورة البارزة</h3>
           <input type="file" class="upload-thumb" name="show_thumb"  accept="image/*"/>
    </div>     
         
      <div class="info disabled">
        <h3>:تصنيفات <span class="text">الموضوع</span></h3>
           <select multiple class="multi" name="show_caterogies[]">
        <?php
        
        $extract_cat = mysql_query("select * from caterogies_table");
      
         while ( $cats = mysql_fetch_assoc($extract_cat) ) {
    
    echo "<option value='".$cats['cat_name']."'>".$cats['cat_name']."</option>";
    
   }
        
        ?>
            </select>
    </div>
      
          <div class="info disabled">
    <h3>:جودة <span class="text">الموضوع</span></h3>          
        <input type="text" name="show_quality" />   
          </div>
             <div class="info disabled">
    <h3>:بلد <span class="text">الموضوع</span></h3>          
        <input type="text" name="show_country"/>   
    </div>
                       <div class="info disabled">
    <h3>:سنة الاصدار</h3>          
        <input type="text" name="show_year"/>   
    </div>
    <div class="info disabled">
    <h3>:المدة الزمنية</h3>          
        <input type="text" name="show_length"/>   
    </div>
        <div class="info disabled">
    <h3>:فريق العمل</h3>          
         <select class='cast' multiple name="show_cast[]"></select>   
    </div>         
        <div class="info disabled">
    <h3>:كلمات البحث</h3>          
         <select class='cast' multiple name="show_keywords[]"></select>   
    </div>
        
        
          <div class="info disabled">
    <h3>:IMDB رابط صحفة <span class="text">الموضوع</span> علي </h3>          
        <input type="text" name="show_imdb"/>
          
          </div>
          
          <div class="add-article-sign"><h3>اعلان <span class="text">الموضوع</span></h3></div>
          <div class="information-container">
    <div class="info disabled upload-article-add" style="margin-bottom:20px;">
    <div class="fullwidth">
        <textarea class="adsrc" placeholder="اضف شفرة المصدر هنا" name="show_trailer_src"></textarea>
        
        </div>    
    
              </div>
    <div class="add-article-sign" stye="margin-top:20px;"><h3>سيرفرات المشاهدة</h3></div>
         <div class="watch-server-add">

        <select class='servers-name' multiple name="servers_names[]" style="margin-bottom: 20px;">
         <option></option>
        </select>
           <select class='servers-links' multiple name="servers_links[]"></select>
             
             </div>
         
       <div class="add-article-sign" stye="margin-top:20px;"><h3>سيرفرات التحميل</h3></div>
         <div class="watch-server-add">

        <select class='download-names' multiple name="download_names[]" style="margin-bottom: 20px;">
         <option></option>
        </select>
           <select class='download-links' multiple name="download_links[]"></select>
             
             </div>    
        
             
         
         </div>
              <div class="add-article-sign" style="margin-bottom:20px;"><h3>بنية الموضوع</h3></div>
  <div class="info" style="margin-top:70px;margin-bottom:40px;">
    <select class="options structer" name="show_structer">
    <option disabled selected>الرجاء اختيار نوع</option>    
    <option value="1">عادي</option>    
    <option value="2">مثبت</option>    
    <option value="3">قريبا</option>  
    <option value="4">مسودة</option>  
        
    </select>   
    </div>
    </div>
    

    
</div>    
    
  
           </div>
    
           
     
  <input type="hidden" name="proccess" value="ok">
    <button class="publish">نشر</button>

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
 
    $("#addshow").submit(); 

});

if ($(window).width() < 700) {
 $('.select2').attr('style','width:90%');
}

$(".structer").change(function () {
 
 if($('.structer').val() == 4) {
  $('.publish').html("حفظ");
 }  else {
  $('.publish').html("نشر");
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
    
    
        $(".servers-name").select2({
  tags: true,
dir:'rtl',
placeholder: "قم بكتابة اسماء سيرفرات المشاهدة هنا",
    formatNoMatches: function() {
        return '';
    },
    dropdownCssClass: 'select2-hidden'
});
        
                $(".servers-links").select2({
  tags: true,
dir:'rtl',
placeholder: "قم بكتابة اكواد سيرفرات المشاهدة هنا",
    formatNoMatches: function() {
        return '';
    },
    dropdownCssClass: 'select2-hidden'
});
                
                $(".download-names").select2({
  tags: true,
dir:'rtl',
placeholder: "قم بكتابة اسماء سيرفرات التحميل هنا",
    formatNoMatches: function() {
        return '';
    },
    dropdownCssClass: 'select2-hidden'
});
        
                $(".download-links").select2({
  tags: true,
dir:'rtl',
placeholder: "قم بكتابة روابط سيرفرات التحميل هنا",
    formatNoMatches: function() {
        return '';
    },
    dropdownCssClass: 'select2-hidden'
});
 
</script>

    
  </body>
</html>    