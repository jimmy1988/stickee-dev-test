<?php
  include("php/frontend/components/top/cacheControl.php");
?>

<!DOCTYPE html>
<html>
  <head>

    <title><?php echo isset($pageTitle) && !empty($pageTitle) ? $pageTitle : ""; ?> - <?php echo defined("APP_NAME") ? APP_NAME : ""; ?> </title>

    <?php
      include("php/frontend/components/top/metaTags.php");
      include("php/frontend/components/top/styles.php");
    ?>

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="vendor/jquery/jquery.min.js"></script>
  </head>
  <body>
    <div id="all">
