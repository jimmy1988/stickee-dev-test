<?php
  $pageTitle = "Widget";

  include("php/config.php");
  require_once("php/functions.php");
  include("php/class/import_classes.php");
  include("php/frontend/includes/top.php");
  include("php/frontend/includes/topBar.php");
  include("php/frontend/includes/header.php");
  include("php/frontend/includes/breadcrumbs.php");
?>

<div id="content">
  <div class="container">
    <div class="row bar">
      <!-- LEFT COLUMN _________________________________________________________-->
      <div class="col-lg-9">
        <p class="lead">Built purse maids cease her ham new seven among and. Pulled coming wooded tended it answer remain me be. So landlord by we unlocked sensible it. Fat cannot use denied excuse son law. Wisdom happen suffer common the appear ham beauty her had. Or belonging zealously existence as by resources.</p>
        <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product details, material & care and sizing</a></p>
        <div id="productMain" class="row">
          <div class="col-sm-6">
            <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
              <div> <img src="img/no_image_available.png" alt="" class="img-fluid"></div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box">
              <form>
                <div class="sizes">
                  <h3>Amount Required</h3>
                  <input type="number" name="amount-required" class="bs-select" id="amount-required" />
                </div>
                <p class="price">$124.00</p>
                <p class="text-center">
                  <button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                  <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></button>
                </p>
              </form>
            </div>
            <div data-slider-id="1" class="owl-thumbs">

            </div>
          </div>
        </div>
        <div id="details" class="box mb-4 mt-4">
          <p></p>
          <h4>Product details</h4>
          <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
          <h4>Material & care</h4>
          <ul>
            <li>Polyester</li>
            <li>Machine wash</li>
          </ul>
          <h4>Size & Fit</h4>
          <ul>
            <li>Regular fit</li>
            <li>The model (height 5'8 "and chest 33") is wearing a size S</li>
          </ul>
          <blockquote class="blockquote">
            <p class="mb-0"><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include("php/frontend/includes/scripts.php");
  include("php/frontend/includes/footer.php");
  include("php/frontend/includes/bottom.php");
?>
