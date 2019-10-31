<!-- FOOTER -->
    <footer class="main-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h4 class="h6">Contact</h4>
            <p class="text-uppercase">
              <strong><?php echo defined("APP_NAME") ? APP_NAME : ""; ?></strong><br />
              <strong><?php echo defined("AUTHOR") ? AUTHOR : ""; ?></strong><br>
              <?php
                if(defined("CONTACT_INFO")){
                  foreach (CONTACT_INFO as $key => $address) {
                    echo "<span>" . $address . "</span><br />";
                  }
                }
              ?>
            </p>
            <hr class="d-block d-lg-none">
          </div>
        </div>
      </div>
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center-md">
              <p>&copy; <?php echo date("Y"); ?>. <?php echo defined("APP_NAME") ? APP_NAME : ""; ?></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
