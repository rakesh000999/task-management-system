<?php
session_start();
unset($_SESSION['email']);

echo header('Location:login.php');
