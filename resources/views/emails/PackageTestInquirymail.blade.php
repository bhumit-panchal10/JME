<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$file = file_get_contents($root . '/mailers/packagecontactmail.html', 'r');

$file = str_replace('#name', $data['name'], $file);
$file = str_replace('#email', $data['email'], $file);
$file = str_replace('#mobile', $data['whatsapp'], $file);
$file = str_replace('#address', $data['address'], $file);
$file = str_replace('#message', $data['query'], $file);
$file = str_replace('#type', $data['type'], $file);
echo $file;
?>
