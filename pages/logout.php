<?php
session_start();

// Unset the session variable to log the user out
unset($_SESSION['user_logged_in']);

// Destroy the session to clear all session data
session_destroy();

// Redirect the user to the login page after logout
header('Location: login.php');
exit;
