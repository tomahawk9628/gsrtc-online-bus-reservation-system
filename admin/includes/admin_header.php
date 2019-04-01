
<?php
session_start(); ob_start();
include "config.php"; 
 if ($_SESSION['s_username'] == "") {
     # code...
    header("location: index.php");
    //echo "<script language='javascript'>document.location='index.php'</script>";
 }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GSRTC - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link rel="icon" type="image/x-icon" href="images/icons/admin.png">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

     <!--Bootstrap CSS-->
    <!--<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">-->

        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <!--<link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">-->
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <!-- <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">-->
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <!--<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all"> -->
   <!--  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
 -->
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <?php include "admin_navigation.php"; ?>
    </div>
