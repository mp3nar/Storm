<?php require "authorization.php"; ?>
<?php require "../inc/config.php"; ?>
<?php
 

$update_id = $_POST['update_id'];
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
if (isset($_POST['show_div'])) {
    $show_div = $_POST['show_div'];
    
}


 ///////////
 
 // show_name
 if (!empty($_POST['show_name'])) {
    $show_name = $_POST['show_name'];
    $update1 = mysql_query("update shows_table set show_name='$show_name' where id=".$update_id);
 }
 
 ///////
 
 //show story
 if (!empty($_POST['show_story'])) {
    $show_story = $_POST['show_story'];
    $update2 = mysql_query("update shows_table set show_story='$show_story' where id=".$update_id);
 }

 /////////////
 
 //show special message
 if (!empty($_POST['show_special_message'])) {
 if (isset($_POST['show_special_message'])) {
  $show_special_message = $_POST['show_special_message'];
 }else {
  $show_special_message = "none";
 }
 $update3 = mysql_query("update shows_table set show_special_message='$show_special_message' where id=".$update_id);
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
  $update4 = mysql_query("update shows_table set show_thumb='$thumb_name' where id=".$update_id);
}else {
   header("Location: index.php?load=addnew&&error=fileupload");
}
}  
  ///////////////////
  
//show caterogies
if (!empty($_POST['show_caterogies'])) {
$show_caterogies = implode(',',$_POST['show_caterogies']);
$update5 = mysql_query("update shows_table set show_caterogies='$show_caterogies' where id=".$update_id);
}

//////////////

//show quality
if(!empty($_POST['show_quality'])) {
    $show_quality = $_POST['show_quality'];
    $update6 = mysql_query("update shows_table set show_quality='$show_quality' where id=".$update_id);
}

//////////

//show country
if(!empty($_POST['show_country'])) {
    $show_country = $_POST['show_country'];
    $update7 = mysql_query("update shows_table set show_country='$show_country' where id=".$update_id);
}
/////////

//show cast
if (!empty($_POST['show_cast'])) {
    
   $show_cast = implode(',',$_POST['show_cast']);
   $update8 = mysql_query("update shows_table set show_cast='$show_cast' where id=".$update_id);
}

////////

//show keywords
if (!empty($_POST['show_keywords'])) {
    
   $show_keywords = implode(',',$_POST['show_keywords']);
   $update9 = mysql_query("update shows_table set show_keywords='$show_keywords' where id=".$update_id);
}

if (!empty($_POST['show_length'])) {
    
   $show_length = $_POST['show_length'];
   $update10 = mysql_query("update shows_table set show_length='$show_length' where id=".$update_id);
}

/////////////

//show imdb
if(!empty($_POST['show_imdb'])) {
    $show_imdb = $_POST['show_imdb'];
    $update10 = mysql_query("update shows_table set show_imdb='$show_imdb' where id=".$update_id);
}
///////

//show trailer
if (!empty($_POST['show_trailer_src'])) {
$show_trailer_pure = $_POST['show_trailer_src'];
$show_trailer = strip_tags($show_trailer_pure,"<iframe></iframe>");
$update11 = mysql_query("update shows_table set show_trailer='$show_trailer' where id=".$update_id);
}

// show watch servers
$servers_name = implode(',',$_POST['servers_names']);
$servers_links = implode(',',$_POST['servers_links']);
////////////

// show download servers
$download_names = implode(',',$_POST['download_names']);
$download_links = implode(',',$_POST['download_links']);
///////////////

// next id


////////////////////

//show structer
$show_structer = $_POST['show_structer'];

//show date

// show yeay
if(!empty($_POST['show_year'])) {
    $show_year = $_POST['show_year'];
    $update12 = mysql_query("update shows_table set show_year = '$show_year' where id=".$update_id);
}


  $add_show = mysql_query("UPDATE shows_table set
show_sort = '$show_sort',
show_div = '$show_div',
show_structer = '$show_structer'
where id=".$update_id);
  

////////////////////////////////////////////////////////////////////////////////////////////////////
if (!empty($_POST['servers_names']) || !empty($_POST['servers_links'])) {
    $delet_watch_servers = mysql_query("delete from watch_servers where parent_id=".$update_id);
    if( $delet_watch_servers == true ) {
            foreach ( array_combine($_POST['servers_names'],$_POST['servers_links']) as $s_name => $s_link ) {
   $add_watch_servers = mysql_query("insert into watch_servers (server_name,server_link,parent_id) values('$s_name',
   '$s_link','$update_id')");
}
    }
}

if (!empty($_POST['download_names']) || !empty($_POST['download_links'])) {
    
    $delete_download_servers = mysql_query("delete from download_servers where parent_id=".$update_id);
    if($delete_download_servers == true ) {
//////////////////////////////////////////////////////////////////
foreach(array_combine($_POST['download_names'],$_POST['download_links']) as $d_name => $d_link) {
   $add_download_servers = mysql_query("insert into download_servers (download_name,download_link,parent_id) values('$d_name',
   '$d_link','$update_id')");
}
}
}


header("Location: index.php?load=allarticles&&proccess=updatesuccess");


?>