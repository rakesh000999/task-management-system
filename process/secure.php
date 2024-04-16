<?php
session_start();
if (isset($_SESSION['email'])) {
} else {
    echo header('Location:login.php');
}
