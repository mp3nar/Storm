<?php require "authorization.php"; ?>

<?php



require "../inc/config.php";









//////////////////////////////////////////////////////////////////

$login = $_SESSION['login'];

$extract_user_data = mysql_query("select * from users_table where user_name='$login'");

$user_data = mysql_fetch_assoc($extract_user_data);

?>



<div class="add-article-container">



    <div class="add-article-sec">

    <div class="add-article-sign"><h3>اعدادات الحساب</h3></div>

    <div class="information-container">

  <form action="account_setting_proccess.php" method="post" enctype="multipart/form-data" id="form">      

       <div class="info">

        <h3>:الاسم</h3>

           <input id='name' type='text' value="<?php echo $user_data['name']; ?>" name="name"  />

    </div>



        <div class="info">

        <h3>:اسم المستخدم</h3>

            <input id='name' type='text' value="<?php echo $user_data['user_name']; ?>" disabled name="user_name"  />

    </div>    

    <div class="info">

        <h3>:البريد الالكتروني</h3>

           <input type="text"  name="user_email" value="<?php echo $user_data['user_email']; ?>"  />

    </div>     

        <div class="info">

        <h3>:كلمة السر </h3>

           <input type='text' value="<?php echo $user_data['user_password']; ?>" name="user_password" disabled  />

        </div>

     <div class="info">

        <h3>:الصورة الشخصية للمستخدم</h3>

           <input type="file" class="upload-thumb" name="user_picture"  />

    </div>

         <div class="info">

        <h3>:تصريح المستخدم</h3>

            <input type='text' disabled value="<?php echo $user_data['authorization']; ?>"  />

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



    

    $('#form').submit();





   

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