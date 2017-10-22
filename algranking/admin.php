<?php session_start();  ?>
<!DOCTYPE html>
<?php 
include './includes/functions.php';
if(isset($_SESSION['admin_id'])==null){

redirect_to('login.php');
}
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<link rel="stylesheet" type="text/css" href="basicGrey.css"/>
        <link rel="stylesheet" type="text/css" href="../css/960.css"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <link rel="stylesheet" type="text/css" href="../css/admin.css"/>
        <link rel="stylesheet" type="text/css" href="menus-core.css"/>
        <link rel="stylesheet" type="text/css" href="menus-dropdown.css"/>
        <link rel="stylesheet" type="text/css" href="menus-horizontal.css"/>
        <link href='http://fonts.googleapis.com/css?family=Cabin|Fjalla+One' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Share+Tech|Carter+One|Share+Tech+Mono' rel='stylesheet' type='text/css'/>
    <head>
        <meta charset="UTF-8">
        <title>MK TITANS</title>
    </head>
    <body>
     <?php include './includes/admin_navigation.php' ?>
	<div id="content">
<div class="container_12">

</div>
</div>

    </body>
</html>