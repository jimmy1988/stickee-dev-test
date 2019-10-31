<!-- Navbar Start-->
<header class="nav-holder make-sticky">
  <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
    <div class="container">
          <a href="/" class="navbar-brand home logo-top">
            <img src="img/logo.png" alt="Application Logo" class="d-none d-md-inline-block logo logo-lg">
            <img src="img/logo.png" alt="Universal logo" class="d-inline-block d-md-none logo logo-sm">
            <span class="sr-only">Stickee Dev Test Logo</span>
          </a>
          <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
          <div id="navigation" class="navbar-collapse collapse">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item dropdown active"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Home</a></li>
            </ul>
          </div>


          <div id="search" class="collapse clearfix">
            <form role="search" class="navbar-form">
              <div class="input-group">
                <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                  <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
              </div>
            </form>
          </div>
        </div>
</header>
<!-- Navbar End-->

<?php
  include("php/frontend/includes/loginModal.php");
?>
