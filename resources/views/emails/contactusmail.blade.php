<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$file = file_get_contents($root . '/mailers/contactmail.html', 'r');
$file = str_replace('#name', $data['name'], $file);
$file = str_replace('#email', $data['email'], $file);
$file = str_replace('#mobile', $data['mobile'], $file);
$file = str_replace('#comment', $data['comment'], $file);
echo $file;
?>
