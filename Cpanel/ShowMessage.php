<?php include "cp-header.php"; ?>

<?php include "cpanel-right.php"?>

<style>

 

 .sender-name-show {

    background-image: url("../images/black-layer-8.png");

    width: 100%;

    padding: 10px;

    min-height: 70px;

    overflow: auto;

    

    margin-bottom: 15px;

    

 }

  .sender-name-show h2 {

    color: white;

    font-family: DroidKufi;

    text-align: right;

    margin: 0;

    font-size: 22pt;

    margin-top: 8px;

  }

    .message-content-show {

           background-image: url("../images/black-layer-8.png");

    width: 100%;

    padding: 10px;

    min-height: 200px;

    overflow: auto;

    margin-bottom: 15px;

    }

    .message-content-show p {

        color: white;

    font-family: DroidKufi;

    text-align: right;

    margin: 0;

    font-size: 20pt;

    

    }

    button {

        border: none;

        background-color: #00c7fc;

        text-align: center;

        padding: 10px 80px 10px 80px;

        color:white;

    }

    .cpanel-left {

        padding: 20px 25px;

    }

    @media screen and (max-width:768px) {

        .message-content-show p {

            font-size: 16pt;

        }

        .sender-name-show h2 {

            font-size: 18pt;

        }

    }

</style>

<?php

$message_id = intval($_GET['id']);

$get_messages = mysql_query("select * from messages_table where id=".$message_id);

$extract_messages = mysql_fetch_assoc($get_messages);



?>

<div class="cpanel-left">

    

<div class=sender-name-show>

<h2><?php echo htmlspecialchars($extract_messages['sender_name'])?></h2>    

    

</div>

<div class=sender-name-show>

<h2><?php echo htmlspecialchars($extract_messages['sender_email'])?></h2>    

    

</div>

<div class=message-content-show>



    

<p><?php echo htmlspecialchars($extract_messages['message_content'])?></p>    

    

</div>

<button class="close-message">اغلاق</button>

    

</div>

<script src="../js/jquery-3.1.0.min.js"></script>

<script type="text/javascript" src="../js/materialize.js"></script>

<script src="../js/ajax.js"></script>

<script src="../js/moviesstorm.js"></script>

<script>

    $(function() {

        

       if($(window).width() < 768) {

        $('html,body').animate({scrollTop:'1572'});

       }

       $(".close-message").click(function() {

        

    $(".cpanel-left").load("messages.php");

        });

        

       

    });

</script>

  </body>

</html>    