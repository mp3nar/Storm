<?php require "authorization.php"; ?>

<?php



require "../inc/config.php";



$get_website_info = mysql_query("select * from website_info");

$web_info = mysql_fetch_assoc($get_website_info);

$id = intval($_GET['id']);



$publish = mysql_query("update shows_table set show_structer='1' where id=".$id);



/////////////// send emails to subscribers



$get_emails = mysql_query("select * from alert_emails where alert_show_id=".$id);



while ($email = mysql_fetch_assoc($get_emails)) {

    $get_show_name = mysql_query("select * from shows_table where id=".$email['alert_show_id']);
    $name = mysql_fetch_assoc($get_show_name);
    $link = $_SERVER['SERVER_NAME'] . "/movie.php?id=" . $name['id'];
    $headers   = 'From: '. $web_info['website_name'] . "\r\n" .
    'Reply-To: '. $web_info['website_name'] . "\r\n";
    $headers  .= "MIME-Version: 1.0".PHP_EOL;
    $headers  .= "Content-Type: text/html; charset=UTF-8";
    $message  = "
<html>
<head>
<link rel='stylesheet' type='text/css' href='http://stormscript.000webhostapp.com/css/style.css' />
</head>
<body>
<div class='container' style='width:100%;padding:5px;background-color:#00c7fc;text-align:center'>
<h2 style='font-family:DroidKufi;color:white;direction:rtl;text-align:center'>تنبيه بشأن فيلم / مسلسل</h2>
</div>
</br>
<p style='font-family:DroidKufi;text-align:right;font-size:18t;background-color:#00c7fc;color:white;padding:8px'>مرحبا...لقد وددنا ان نعلمك ان ".$name['show_name']." اصبح متاحا علي موقعنا ويمكنك الأن تحميله ومشاهدته مجانا قم بنسخ الرابط ادناه في متصفحك ليتم توجيهك الي صفحة العرض..ولقد وصلتك هذه الرسالة لانك قمت بالاشتراك في تنبيهات هذا العرض في موقعنا</p></br>
<span style='font-family:DroidKufi;padding:10px;width:100%;background-color:#00c7fc;color:white;float:right;text-align:center' >".$link."</button></br>

</body>
</html>
";
     $send = mail($email['email'],"تنبيه",$message,$headers);



}



if ($send == true) {

    header("Location: index.php?load=allarticles&&proccess=publishsuccess");

}





?>