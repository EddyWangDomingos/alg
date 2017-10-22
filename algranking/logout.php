<?php
session_start();
include './includes/functions.php';

$_SESSION['admin_id']=null;
$_SESSION['username']=null;

redirect_to("login.php");





?>