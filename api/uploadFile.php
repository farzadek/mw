<?php

header('Access-Control-Allow-Origin: https://montrealweb.ca');
header('Content-Type: application/json');

$adminEmail = 'farzadek@gmail.com';
$fields = ['message'];
$form = [];


/* upload file */
$target_dir = "voices/";
$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$uploadOk = 1;
$audioFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size in bytes
if ($_FILES["fileToUpload2"]["size"] > 5000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats only .wav, .mp3, .wma, and .mp4 files can be uploaded
if($audioFileType != "wav" && $audioFileType != "mp3" && $audioFileType != "wma"
&& $audioFileType != "mp4" ) {
    echo "Sorry, only wav, mp3, wma & mp4 files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
/* ****************** */


foreach ($fields as $field) {
    $filter = 'email' === $field ? FILTER_SANITIZE_EMAIL : FILTER_SANITIZE_ENCODED;
    $form[$field] = filter_var(htmlentities(trim($_GET[$field] ?? '')), $filter);
}

$isEnglish = $_GET['lang'] === 'en';
$form['lang'] = $isEnglish ? 'english' : 'french';

$adminContent = [
    'email' => $adminEmail,
    'subject' => 'Voice message received from montrealweb-contact',
    'body' => sprintf('<p>Message: %s</p>', $form['message']),
];

$clientContent = [
    'email' => $form['email'],
    'subject' => $isEnglish ? 'Your message received' : 'On a reçu votre message',
    'body' => $isEnglish ? '<p>We received your message, we will contact you as soon as possible.</p>MontrealWeb.ca<br/>(438) 300-0456' : '<p>Nous avons reçu votre message, nous vous contacterons dès que possible.</p>MontrealWeb.ca<br/>(438) 300-0456',
];

$headers = [
    'MIME-Version' => '1.0',
    'Content-type' => 'text/html; charset=utf8',
    'From' => $adminEmail,
    'Reply-To' => $adminEmail,
    'X-Mailer' => 'PHP/' . phpversion()
];

$results = [
    'admin' => false,
    'client' => false,
    'error' => null,
];

try {
    $results['admin'] = sendEmail($adminContent, $headers);
    $results['client'] = sendEmail($clientContent, $headers);
} catch (Throwable $e) {
    $results['error'] = $e;
}

echo json_encode($results);
die;

function sendEmail($content, $headers) {
    return mail($content['email'], $content['subject'], $content['body'], $headers);
}