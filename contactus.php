<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact form</title>
</head>
<body>
    <?php

// $nameerror="";
// $emailerror="";
// $messageError="";
$nameerror = "";
$emailerror = "";
$messageerror = "";

$name = "";
$message = "";
$email = "";
if (count($_POST) > 0) {

    $name = "";
    $message = "";
    $email = "";
    $name = isset($_POST["name"])?$_POST["name"]:"";
    
    $message =isset($_POST["message"])?$_POST["message"]:""; 
    $email = isset($_POST["email"])?$_POST["email"]:"";
    $userid=file_exists("email.txt")?file_get_contents("email.txt"):0;
    $userid=(int)$userid+1;
 
    require_once("config.php");

    if (strlen($name) > 100) {
        $nameerror = "Your name must be less than 100 characters";
    } elseif (strlen($message) > 255) {
        $messageerror = "Your message must be less than 255 characters ";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerror = "Your email is invalide ";
        $error = "Your email is invalide ";
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];  
 
        $visit=date( "F j Y g:i a" );
     
        $emailFile=fopen("email.txt","a+");
        fwrite($emailFile,"$visit,$ip,$email,$name".PHP_EOL);
    
        fclose($emailFile);
        echo "<h1>thanks for contacting with Us</h1> ";
        // $name=isset($name)? $_POST("name"):"";
 
        
        
    //  echo  $emailArr;
        foreach ($_POST as $key => $value) {
            echo "<strong> $key</strong>: $value   ";
          

        }
    }
}
?>
     <html>
    <head>
        <title>  </title>
    </head>

    <body>
    <h3> Contact Form </h3>
        <div id="after_submit">
            <?php
if (isset($error)) {
    echo $error;
}

?>
        </div>
        <form id="contact_form" action="contactus.php" method="POST" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php if (isset($name)) {
    echo $name;
}
?>" size="30" /><?php if (isset($nameerror)) {
    echo $nameerror;
}?>
<br />
            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php if (isset($email)) {
    echo $email;
}
?>" size="30" />
                <?php if (isset($emailerror)) {
    echo $emailerror;
}?>

                <br />

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30" value="<?php if (isset($message)) {
    echo $message;
}
?>"></textarea><?php if (isset($messageerror)) {
    echo $messageerror;
}
?><br />

            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="reset" value="clear form" />

        </form>
    </body>

</html>

</body>
</html>