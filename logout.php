<?php
session_start();
require_once "./config/utils.php";
unset($_SESSION[AUTH]);
header('location: '. BASE_URL);
?>