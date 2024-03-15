<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_POST['captcha']){
        if($_POST['captcha']==$_SESSION['captcha'])
        echo'code captcha correct! <a href="/index.php">ok</a>';
    else echo'le captcha entre est invalid ! <a href="/index.php">recommencer </a>';
    }
    ?>
</body>
</html>