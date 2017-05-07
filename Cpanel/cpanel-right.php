<?php require "authorization.php"; ?>
<?php

require "../inc/config.php";
$auth = $_SESSION['login'];

$extract_auth = mysql_query("select * from users_table where user_name='$auth'");
$user_auth = mysql_fetch_assoc($extract_auth);
$style3 = "block";
$style2 = "block";
if ($user_auth['authorization'] == "محرر") {
    $style2 = "none";
    $style3 = "none";
}else if ($user_auth['authorization'] == "مساعد مدير") {
    $style3 = "none";
}


?>
<div class="cpanel-right">
    <ul>
    <a href="#"><li class="home-button scrollToCon">الرئيسية<i class="fa fa-home"></i></li></a>
    <a href="#"><li class="add-new scrollToCon">اضافة موضوع<i class="fa fa-pencil-square"></i></li></a>
    <a href="#"><li class="all-articles-load scrollToCon">جميع المواضيع<i class="fa fa-file"></i></li></a>
    <a href="#"><li class="pages">صفحات<i class="fa fa-clone"></i><span>
        <div class="page-sec add-new-page scrollToCon">
        <h3>اضافة صفحة</h3>
        </div>
          <div class="page-sec all-pages-load scrollToCon">
        <h3>جميع الصفحات</h3>
        </div>
        </span></li></a>
        
    <a href="#"><li class="caterogies"> التصنيفات و الاقسام<i class="fa fa-bookmark"></i><span>
        <div class="cat-sec add-new-cat scrollToCon">
        <h3>اضافة تصنيف</h3>
        </div>
          <div class="cat-sec add-new-div scrollToCon">
        <h3>اضافة قسم</h3>
        </div>
            <div class="cat-sec add-new-dropdown scrollToCon">
        <h3>قائمة منسدلة</h3>
        </div>
          <div class="cat-sec all-cat-load scrollToCon">
        <h3>جميع التصنيفات</h3>
        </div>
                    <div class="cat-sec all-div-load scrollToCon">
        <h3>جميع الاقسام</h3>
        </div>
        </span></li></a>    
    <a href="#"><li class="load-comments scrollToCon">التعليقات<i class="fa fa-comments"></i></li></a>
        
    <a href="#"><li style="display:<?php echo $style2; ?>" class="members">الاعضاء<i class="fa fa-users"></i><span>
        <div class="mem-sec add-new-mem scrollToCon">
        <h3>اضافة عضو</h3>
        </div>
          <div class="mem-sec all-mem-load scrollToCon">
        <h3>جميع الاعضاء</h3>
        </div>
        </span></li></a>
    <a href="#"><li class="reports scrollToCon">البلاغات<i class="fa fa-window-close"></i></li></a>
    <a href="#"><li style="display:<?php echo $style2; ?>" class="messages scrollToCon">الرسائل<i class="fa fa-envelope"></i></li></a>
    <a href="#"><li class="ads" style="display:<?php echo $style2; ?>">الاعلانات<i class="fa fa-bar-chart"></i><span>
        <div class="page-sec add-new-ad scrollToCon">
        <h3>اضافة اعلان</h3>
        </div>
          <div class="page-sec all-ads-load scrollToCon">
        <h3>جميع الاعلانات</h3>
        </div>
    </span></li></a>
    <a href="#"><li class="weekshow-load">العرض الاسبوعي<i class="fa fa-film"></i></li></a>
    <a href="#"><li style="display:<?php echo $style3; ?>" class="settings scrollToCon">الاعدادات<i class="fa fa-gears"></i></li></a>
    <a href="#"><li style="display:<?php echo $style3; ?>"class="securitylog scrollToCon">السجل الأمني<i class="fa fa-warning"></i></li></a>
    <a href="#"><li class="support scrollToCon">الدعم الفني<i class="fa fa-support"></i></li></a>
    </ul>
</div>
<script type='text/javascript'>

    $(function () {
        
    $('.add-new-div').click(function () {
   
   $('.cpanel-left').load('add-div.php');
   
});
    $('.add-new-dropdown').click(function () {
        
       $('.cpanel-left').load("add_dropdown.php") ;
        
    });
    
    $('.all-div-load').click(function () {
  
       $('.cpanel-left').load("all_divisions.php");
        
    });
    
      $('.securitylog').click(function () {
  
       $('.cpanel-left').load("security_log.php");
        
    });
      
            $('.weekshow-load').click(function () {
  
       $('.cpanel-left').load("weekshow-setting.php");
        
    });
    
    $('.add-new-ad').click(function () {
  
       $('.cpanel-left').load("add_new_ad.php");
        
    });
     $('.all-ads-load').click(function () {
  
       $('.cpanel-left').load("all-ads.php");
        
    })
       
    });
    
    
</script>