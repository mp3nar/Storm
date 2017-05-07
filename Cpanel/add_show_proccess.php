<?php require "authorization.php"; ?>
<?php require "../inc/config.php"; ?>
<?php
 


 // show_sort 
   if(isset($_POST['show_sort'])) {
    
    if($_POST['show_sort'] == 1) {
     $show_sort = "الفيلم";
    } else if ($_POST['show_sort'] == 2) {
     $show_sort = "المسلسل";
    }else if ($_POST['show_sort'] == 3) {
     $show_sort = "البرنامج";
    }else if ($_POST['show_sort'] == 4) {
     $show_sort = "المسرحية";
    }

 }
 /////////
 
 // show_div
$show_div = $_POST['show_div'];

 ///////////
 
 // show_name
 $show_name = $_POST['show_name'];
 ///////
 
 //show story
 $show_story = $_POST['show_story'];
 /////////////
 
 //show special message
 if (isset($_POST['show_special_message'])) {
  $show_special_message = $_POST['show_special_message'];
 }else {
  $show_special_message = "none";
 }
  //////////////////
  
  //show thumbnail
$show_thumb_tmp_name = $_FILES['show_thumb']['tmp_name'];
$valid_file_types = array(
    "image/gif",
    "image/png",
    "image/jpeg",
    "image/pjpeg",
);
if ($_FILES['show_thumb']['size'] !== 0) {
if (in_array($_FILES['show_thumb']['type'],$valid_file_types)) {
   
  $thumb_name = rand(1,99999) . '.' . end(explode(".",$_FILES["show_thumb"]["name"]));
  $upload_show_thumb = move_uploaded_file($show_thumb_tmp_name,'uploads/shows_images/'.$thumb_name);
  
}else {
   header("Location: index.php?load=addnew&&error=fileupload");
   die();
}
}else {
   $thumb_name = "no-img.jpg";
}
  ///////////////////
  
//show caterogies
$show_caterogies = implode(',',$_POST['show_caterogies']);
//////////////

//show quality
$show_quality = $_POST['show_quality'];
//////////

//show country
$show_country = $_POST['show_country'];
/////////
$show_length = $_POST['show_length'];
////////
//show cast
$show_cast = implode(',',$_POST['show_cast']);
////////

//show keywords
$show_keywords = implode(',',$_POST['show_keywords']);
/////////////

//show imdb
$show_imdb = $_POST['show_imdb'];
///////

//show trailer
$show_trailer_pure = $_POST['show_trailer_src'];
$show_trailer = strip_tags($show_trailer_pure,"<iframe></iframe>");


// show watch servers
$servers_name = implode(',',$_POST['servers_names']);
$servers_links = implode(',',$_POST['servers_links']);
////////////

// show download servers
$download_names = implode(',',$_POST['download_names']);
$download_links = implode(',',$_POST['download_links']);
///////////////

// next id
$extract_next_id = mysql_query("SHOW TABLE STATUS LIKE 'shows_table'");
$data = mysql_fetch_assoc($extract_next_id);
$next_id = $data['Auto_increment'];

////////////////////

//show structer
$show_structer = $_POST['show_structer'];

//show date
$show_date = date("d/m/Y h:i a", time());

// show yeay
$show_year = $_POST['show_year'];

  $add_show = mysql_query("insert into shows_table (show_sort,show_div,show_name,show_story,show_thumb,show_special_message
 ,show_caterogies,show_quality,show_country,show_cast,show_keywords,show_imdb,show_trailer,
 show_structer,show_date,show_year,show_likes,show_dislikes,show_length) values ('$show_sort','$show_div','$show_name','$show_story','$thumb_name','$show_special_message','$show_caterogies'
   ,'$show_quality','$show_country','$show_cast','$show_keywords','$show_imdb','$show_trailer','$show_structer','$show_date','$show_year','0','0','$show_length')");
  
  if ($add_show == true) {
   echo "good";
  }else {
   echo "bad";
  }

////////////////////////////////////////////////////////////////////////////////////////////////////

foreach ( array_combine($_POST['servers_names'],$_POST['servers_links']) as $s_name => $s_link ) {
   $add_watch_servers = mysql_query("insert into watch_servers (server_name,server_link,parent_id) values('$s_name',
   '$s_link','$next_id')");
}
//////////////////////////////////////////////////////////////////
foreach(array_combine($_POST['download_names'],$_POST['download_links']) as $d_name => $d_link) {
   $add_download_servers = mysql_query("insert into download_servers (download_name,download_link,parent_id) values('$d_name',
   '$d_link','$next_id')");
}
if($show_structer == 4){
   header("Location: index.php?load=addnew&&proccess=successdraft");
   
}else {
header("Location: index.php?load=addnew&&proccess=success");
}
?>