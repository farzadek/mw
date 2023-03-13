<?php
header('Access-Control-Allow-Origin: *');
$content = trim(file_get_contents("php://input"));
$name = isset($_GET['name']) && !empty($_GET['name']) ? filter_var(htmlentities(trim($_GET['name'])), FILTER_FLAG_STRIP_HIGH) : '';
$phone = isset($_GET['phone']) && !empty($_GET['phone']) ? filter_var(htmlentities(trim($_GET['phone'])), FILTER_FLAG_STRIP_HIGH) : '';
$email = isset($_GET['email']) && !empty($_GET['email']) ? filter_var(htmlentities(trim($_GET['email'])), FILTER_SANITIZE_EMAIL) : '';
$message = isset($_GET['message']) && !empty($_GET['message']) ? filter_var(htmlentities(trim($_GET['message'])), FILTER_FLAG_STRIP_HIGH) : '';
$message = isset($_GET['lang']) && !empty($_GET['lang']) ? filter_var(htmlentities(trim($_GET['lang'])), FILTER_FLAG_STRIP_HIGH) : 'en';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$result = 0;
if (!empty($email)) {
    $subject = $lang == 'en' ? 'Your message received' : 'On a recu votre message';
    $reply = $lang == 'en' ? '<p>We received your message, we will be contact as soon as possible.</p>MontrealWeb.ca<br/>(438) 300-0456' : '<p>Nous avons recu votre message, nous serons contactés dès que possible.</p>MontrealWeb.ca<br/>(438) 300-0456';
    $headers .= 'From: MontrealWeb.ca' . "\r\n";
    if (mail($email, $subject, $reply, $headers)) {
        $result = 1;
    }
}

$subject = $lang == 'en' ? 'Message received from montrealweb-contact' : 'Message a recu de montrealweb-contact';
$reply = '<p>Name: ' . $name . '</p><p>Phone: ' . $phone . '</p><p>Email: ' . $email . '</p><p>Message: ' . $message . '</p>';
$headers .= 'From: montrealweb - contact' . "\r\n";
if (mail($email, $subject, $reply, $headers)) {
    $result += 2;
}


echo $result;
