<?php
session_start();
session_destroy();
header('Location: dashboard_login.php');
?>