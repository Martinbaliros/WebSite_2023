<?php
require 'recaptcha\autoload.php';
if(isset($_POST['submitpost'])){
    if(isset($_POST['g-recaptcha-response'])){
        $recaptcha = new \ReCaptcha\ReCaptcha("6LeW3-IjAAAAABNpFKWVl1KMgavEMqV0E5MzEop_");
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
            var_dump('Captcha valide');
        } else {
            $errors = $resp->getErrorCodes();
            var_dump('Captcha invalide');
        }
    }
}


// $recaptcha = new \ReCaptcha\ReCaptcha("6LeW3-IjAAAAABNpFKWVl1KMgavEMqV0E5MzEop_");
// $resp = $recaptcha->setExpectedHostname('recaptcha-demo.appspot.com')
//                   ->verify($_POST['gRecaptchaResponse']);
// if ($resp->isSuccess()) {
//     var_dump('Captcha valide');
// } else {
//     $errors = $resp->getErrorCodes();
//     var_dump('Captcha invalide');
// }
//
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h1> captcha de  la muerto</h1>
    <form method="POST">
    <div class="g-recaptcha" data-sitekey="6LeW3-IjAAAAALSfx0-bM5igHnUFvNKdhmQSRxpi"></div><br>
    <input type="submit" value="submit" name="submitpost">

    </form>
</body>
</html>