<?php
session_start();
unset($_SESSION['uid']);
unset($_SESSION['loggedin']);
unset($_SESSION['name']);
 
if(session_destroy())
 {
  header("Location: index.php");
 }
 
