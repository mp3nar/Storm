<?php require "../inc/config.php"; ?>

<?php require "authorization.php"; ?>

<body>



    

<div class="all-articles-container">

 <div class="add-article-sign"><h3>البلاغات الواردة</h3></div>   



<div class="articles-section-container">



 <table style="width:100%; direction:rtl;">

    

     <tr>

     <th style="font-size:10pt;">اسم الموضوع</th>

     <th style="width:20%;font-size:10pt;">سبب البلاغ</th>

     <th style="width:20%;font-size:10pt;">تاريخ البلاغ</th>

     <th style="border-left:none; width:20%;font-size:10pt;">خصائص</th>     

         

     

     </tr>

     

       <?php

         if(!isset($_GET['page'])) {

  $page = 1;

   $y = 10;

  $x = ($page - 1) * $y;

}else if (isset($_GET['page'])) {

  $page = $_GET['page'];

  $y = 10;

  $x = ($page - 1) * $y;

}



$shows_number = mysql_num_rows(mysql_query("select * from reports_table order by id desc"));

$d_c = $shows_number/$y;

       $extract_reports = mysql_query("select * from reports_table order by id desc limit $x,$y");

 if(mysql_num_rows($extract_reports) < 1) {

  $hide_pagination = "none";

 }else {

  $hide_pagination = "block";

 }       

       while ($report = mysql_fetch_assoc($extract_reports)) {

        $show_name = mysql_query("select * from shows_table where id=".$report['reported_show_id']);

        @$name = mysql_fetch_assoc($show_name);

        echo '

        

         <tr>

     <th style="font-size:10pt;">'.htmlspecialchars($name['show_name']).'</th>

     <th style="width:20%;font-size:10pt;">'.htmlspecialchars($report['report_content']).'</th>

     <th style="width:10%;font-size:10pt;">'.$report['report_date'].'</th>

          <th class="properties" style="border-left:none; width:30%;font-size:12pt;padding-right:5px;padding-left:0px;padding-top:20px">

         

        <div class="edit-article users-edit"><a href="../movie.php?id='.$report['reported_show_id'].'" target="_blank"> <h3>عرض الموضوع</h3></a></div> 

        <div class="edit-article users-edit"><a href="editpost.php?id='.$report['reported_show_id'].'" target="_blank"> <h3>تعديل الموضوع</h3></a></div> 

        </th>  

     

     </tr>

        

        

        ';

       }

       

       

       

       

       

       ?>

    

         

    

     



     

     

    

    

    

    </table>

    

    



    

    

<div class="pagination" style="display:<?php echo $hide_pagination; ?>">

 <a ><div class="next-page waves-effect waves-light z-depth-2" id="<?php echo $page; ?>"><h4>السابق</h4></div></a>

<?php

for($i= 0;$i<$d_c;$i++) {

  $j = $i + 1;

  echo '

  <a class="page" id="'.$j.'" ><div class="page-number waves-effect waves-light z-depth-2"><h4>'.$j.'</h4></div></a>

  ';

}





?>

 <a><div class="next waves-effect waves-light z-depth-2" id="<?php echo $page + 1; ?>" title="<?php echo $d_c; ?>"><h4>التالي</h4></div></a> 

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

$(".page").click(function () {

   

      var pagenumber = $(this).attr("id");

      $(".articles-section-container").load("all-repo-pagination.php?page=" + pagenumber);

        $("html,body").animate({scrollTop:'25'});

      

   });

   $(".next-page").click(function () {

      

      page_c = $(this).attr("id") - 1;

      if (page_c <= 0) {

         page = 1;

      }else {

         page = $(this).attr("id") - 1;

      }

      $(".articles-section-container").load("all-repo-pagination.php?page=" + page);

      $("html,body").animate({scrollTop:'25'});

      

   });

   $(".next").click(function () {

        page_cc = $(this).attr("id");



       

      $(".articles-section-container").load("all-repo-pagination.php?page=" + page_cc );

        $("html,body").animate({scrollTop:'25'});

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

   