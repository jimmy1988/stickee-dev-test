<?php
  include("../php/frontend/components/top/cacheControl.php");
?>

<!DOCTYPE html>
<html>
<head>
  <?php
    include("../php/frontend/components/top/metaTags.php");
  ?>

  <title><?php echo isset($pageTitle) && !empty($pageTitle) ? $pageTitle : ""; ?> - <?php echo defined("APP_NAME") ? APP_NAME : ""; ?> Admin</title>

  <?php
    include("php/components/top/styles.php");
  ?>

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
