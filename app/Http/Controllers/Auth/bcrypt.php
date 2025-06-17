<?php
$Password = "kania111";
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
echo $hashedPassword;
?>