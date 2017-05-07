<?php require "authorization.php"; ?>
<!-- Cpanel Header   -->
<div class="website_info_saved member-success" style="   position: fixed;
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
    font-size: 17pt; font-family:DroidKufi;">تم اضافة العضو بنجاح</h2></div>
<div class="website_info_saved comp-data" style="    position: fixed;
    top: 0;
    width: 100%;
    height: auto;
    overflow: auto;
    left:0px;
    padding: 20px 15px 20px 15px;
    text-align: center;
    background-color: #b20000;
    z-index: 9999999999999;
    display:none;"><h2
        style=" color: white;
    margin: 0;
    font-size: 17pt; font-family:DroidKufi;">الرجاء ملئ جميع البيانات</h2></div>
  <div class="add-page-container">
 <div class="head">
    <h4>اضافة عضو</h4>
    </div>
      <div class="add-page-fields-container">
      <input type="text" placeholder="اسم العضو" class="name"/>
      <input type="text" placeholder="اسم المستخدم" class="user-name"/>     
      <input type="text" placeholder="البريد الالكتروني" class="user-email"/>     
      <input type="text" placeholder="كلمة السر" class="user-password"/> 
                  <div class="information-container">
           <div class="info cat-thing">
      
    <select class="cat-or-division" id="user-authorization" >
    <option disabled selected value="0">الرجاء اختيار صلاحية العضو</option>    
    <option value="1">مساعد مدير</option>    
    <option value="2">محرر</option>    
 
        
    </select>
        
        </div>
          </div>  
     <button class="add-member">اضافة العضو</button>
      </div>
      
    
    </div>  
 
    
</div>    
    
 
<script src="../js/jquery-3.1.0.min.js"></script>
<script>
  $(".add-member").click(function () {
   
   var name = $(".name").val();
   var user_name = $(".user-name").val();
   var user_email = $(".user-email").val();
   var user_password = $(".user-password").val();
   var authorize = $("#user-authorization").val();
   
   if(name.length !== 0 && user_name.length !== 0 && user_email.length !== 0 && user_password.length !== 0  && authorize.lenght !== 0 )
   {
     $.ajax({
      
      url:"add_member_proccess.php",
      type:"POST",
      data: {name: name, user_name: user_name, user_email: user_email, user_password: user_password, authorize: authorize},
      success: function (data) {
$(".member-success").slideDown();
 setTimeout(function () {
  
  $(".member-success").slideUp();
 }, 2000);
         
         
      }
      
      
      });
      
      
   }else {
      $(".comp-data").slideDown();
 setTimeout(function () {
  
  $(".comp-data").slideUp();
 }, 2000);
         
         
      }
   
   
   
  });
</script>    
    
    
   
    
    
<!--  End Work Area  -->    
