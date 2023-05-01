<?php
header('Access-Control-Allow-Origin: *');
$who = isset($_GET['who']) && !empty($_GET['who']) ? filter_var(htmlentities(trim($_GET['who'])), FILTER_FLAG_STRIP_HIGH) : '';
$name = isset($_GET['name']) && !empty($_GET['name']) ? filter_var(htmlentities(trim($_GET['name'])), FILTER_FLAG_STRIP_HIGH) : '';
$phone = isset($_GET['phone']) && !empty($_GET['phone']) ? filter_var(htmlentities(trim($_GET['phone'])), FILTER_FLAG_STRIP_HIGH) : '';
$email = isset($_GET['email']) && !empty($_GET['email']) ? filter_var(htmlentities(trim($_GET['email'])), FILTER_SANITIZE_EMAIL) : '';
$message = isset($_GET['message']) && !empty($_GET['message']) ? filter_var(htmlentities(trim($_GET['message'])), FILTER_FLAG_STRIP_HIGH) : '';
$lang = isset($_GET['lang']) && !empty($_GET['lang']) ? filter_var(htmlentities(trim($_GET['lang'])), FILTER_FLAG_STRIP_HIGH) : 'en';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$result = false;
if ($message == '') {
    $subject = 'Message received from montrealweb-contact';
    $reply = '<p>Name: ' . $name . '</p><p>Phone: ' . $phone . '</p><p>Email: ' . $email . '</p><p>Message: ' . $message . '</p><p>Lang: ' . $lang . '</p>';
    $headers .= 'From: montrealweb - contact' . "\r\n";
    if (mail('farzadek@gmail.com', $subject, $reply, $headers)) {
        $result = true;
    }
} else {
    if (!empty($email)) {
        $subject = $lang == 'en' ? 'Your message received' : 'On a recu votre message';
        $reply = $lang == 'en' ? '<p>We received your message, we will contact you as soon as possible.</p>MontrealWeb.ca<br/>(438) 300-0456' : '<p>Nous avons recu votre message, nous serons contactés dès que possible.</p>MontrealWeb.ca<br/>(438) 300-0456';
        $headers .= 'From: MontrealWeb.ca' . "\r\n";
        if (mail($email, $subject, $reply, $headers)) {
            $result = true;
        }
    }
}

echo json_encode(array('result' => $result));
