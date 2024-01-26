<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$adminEmail = 'farzadek@gmail.com';
$fields = ['who','name','phone','email','message'];
$form = [];

foreach ($fields as $field) {
    $filter = 'email' === $field ? FILTER_SANITIZE_EMAIL : FILTER_SANITIZE_ENCODED;
    $form[$field] = filter_var(htmlentities(trim($_GET[$field] ?? '')), $filter);
}

$isEnglish = $_GET['lang'] === 'en';
$form['lang'] = $isEnglish ? 'english' : 'french';

$adminContent = [
    'email' => $adminEmail,
    'subject' => 'Message received from montrealweb-contact',
    'body' => sprintf('<p>Name: %s</p><p>Phone: %s</p><p>Email: %s</p><p>Message: %s</p><p>Lang: %s</p>', $form['name'], $form['phone'], $form['email'], $form['message'], $form['lang']),
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
