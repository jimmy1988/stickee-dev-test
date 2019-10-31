<?php
  $pageTitle = "Widget";

  include("php/config.php");
  require_once("php/functions.php");
  include("php/frontend/includes/top.php");
  include("php/frontend/includes/topBar.php");
  include("php/frontend/includes/header.php");
  include("php/frontend/includes/breadcrumbs.php");
?>

<div id="content">
  <div class="container">
    <div class="row bar">
      <!-- LEFT COLUMN _________________________________________________________-->
      <div class="col-lg-12">
        <p class="lead">A widget design to help your life get better</p>
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
                <p class="price"><span class="currency-symbol">£</span><span class="price-amount"><?php echo defined("WIDGET_PRICE") ? number_format(WIDGET_PRICE, 2) : "0.00"; ?></span>&nbsp;<br /><span class="price-per">Per Widget</span></p>
                <div class="sizes">
                  <h3>Amount Required</h3>
                  <input type="number" name="amount-required" class="bs-select" id="amount-required" />
                </div>

                <div id="breakdown-container">
                  <h4>Your Breakdown</h4>
                  <div id="breakdown">
                    <div>
                      No Amounts given for a breakdown
                    </div>
                  </div>
                </div>

                <!-- <p class="text-center">
                  <button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                  <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></button>
                </p> -->
              </form>
            </div>
            <div data-slider-id="1" class="owl-thumbs">

            </div>
          </div>
        </div>
        <div id="details" class="box mb-4 mt-4">

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="js/updatePricesAndDetails.js"></script>
<?php
  include("php/frontend/includes/scripts.php");
  include("php/frontend/includes/footer.php");
  include("php/frontend/includes/bottom.php");
?>
