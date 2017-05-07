<?php require "authorization.php"; ?>
<?php

require "../inc/config.php";

$word = $_POST['word'];
$get_search = array('1','2');
$search_data = mysql_query("SELECT * FROM shows_table WHERE show_structer IN (1,2) and show_name LIKE '%$word%'");

echo '
   <tr>
     <th style="font-size:10pt;">الرقم</th>
     <th style="width:25%;font-size:10pt;">الاسم</th>
     <th style="width:10%;font-size:10pt;">القسم</th>
     <th style="font-size:10pt;">تاريخ النشر</th>
     <th style="font-size:10pt;">عدد المشاهدات</th>
     <th style="font-size:10pt;">عدد التعليقات</th>
     <th style="font-size:10pt;">عدد المعجبين</th>
     <th style="font-size:10pt;">عدد غير المعجبين</th>
     <th style="border-left:none; width:20%;font-size:10pt;">خصائص</th>     
         
     
     </tr>

';
while ($data = mysql_fetch_assoc($search_data)) {

      $num_comments = mysql_query("select * from comments_table where parent_id=".$data['id']);
      $num_comm = mysql_num_rows($num_comments);
      echo '
           <tr style="font-size:12pt;">
     <th style="font-size:12pt;">'.$data['id'].'</th>
     <th style="width:25%;text-align:right;font-size:12pt;"><a href="../movie.php?id='.$data['id'].'" target="_blank" style="color:white;">'.$data['show_name'].'</a></th>
     <th style="font-size:12pt;width:15%">'.$data['show_div'].'</th>
     <th style="font-size:12pt;">'.$data['show_date'].'</th>
     <th style="font-size:12pt;">'.$data['show_views'].'</th>
     <th style="font-size:12pt;">'.$num_comm.'</th>
     <th style="font-size:12pt;">'.$data['show_likes'].'</th>
     <th style="font-size:12pt;">'.$data['show_dislikes'].'</th>
     <th class="properties" style="border-left:none; width:20%;font-size:12pt;padding-right:5px;padding-left:0px;padding-top:20px">
         <div class="edit-article"><a href="editpost.php?id='.$data['id'].'"><h3>تعديل</h3></a></div>
         
        <div class="edit-article"><a href="deletepost.php?id='.$data['id'].'"> <h3>حذف</h3></a></div> 
        </th>     
         
     
     </tr>
      
      ';
      
}
echo "good";


?>