<?php

session_start();
// destroy session
session_destroy();
// redirect to login page
header("Location:./Login.php"); ?>
