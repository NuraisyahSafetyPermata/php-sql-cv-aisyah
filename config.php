<?php
$host = 'localhost';
$user = 'aisyah';
$pwd = 'safety15';
$db = 'cv';

$conn = mysqli_connect($host, $user, $pwd, $db); // true | false

if (!$conn) {
  die('Gagal terhubung ke database'. mysqli_connect_error());
}
