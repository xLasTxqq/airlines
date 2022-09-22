<?php
session_start();
unset($_SESSION['login_user']);
unset($_SESSION['id_user']);
unset($_SESSION['Admin']);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>