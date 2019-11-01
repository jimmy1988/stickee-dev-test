<?php
  $pageTitle = "Dashboard";

  include("php/includes/session.php");
  include("../php/class/import_classes.php");
  include("php/includes/top.php");
  include("php/includes/header.php");
  include("php/includes/sidebar.php");

  $allProducts = New Product;
  $allProductsResult = $allProducts->getProducts(array(), array(), array("product_name" => "ASC","product_box_qty" => "ASC"));

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php
    if(isset($pageTitle) && !empty($pageTitle)){
      include("php/includes/titlebar.php");
    }

    if(isset($_SESSION['messages']) && !empty($_SESSION['messages'])){
      include("php/includes/messages.php");
    }
  ?>

  <!-- Main content -->
  <section class="content">

    <div class="congtainer-fluid">
      <div class="row">
        <div class="col-md-12">
          <div id="product-form" class="table-responsive">
            <form action="php/updateProducts.php" method="post">
              <div>
                <table id="products-table" class="table table-striped table-condensed">
                  <thead>
                    <tr>
                      <th class="text-center">Product Name</th>
                      <th class="text-center">Box Qty</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if($allProductsResult && $allProductsResult->num_rows > 0){
                        while($row = $allProductsResult->fetch_assoc()){
                          echo "<tr>";
                          echo "<td>";
                          echo "<div class=\"form-group\">";
                          echo "<input type=\"hidden\" name=\"product_id[]\" value=\"" . $row['product_id'] . "\"/>";
                          echo "<input type=\"text\" name=\"product_name[]\" class=\"form-control\" value=\"" . $row['product_name'] . "\"/>";
                          echo "</div>";
                          echo "</td>";
                          echo "<td>";
                          echo "<div class=\"form-group\">";
                          echo "<input type=\"text\" name=\"product_box_qty[]\" class=\"form-control\" value=\"" . $row['product_box_qty'] . "\"/>";
                          echo "</div>";
                          echo "</td>";
                          echo "<td class=\"text-center\">";
                          echo "<a href=\"php/deleteProduct.php?d=true&p=" . $row['product_id'] . "\" onclick=\"deleteRecord()\" class=\"btn btn-danger deleteProductButton\"><i class=\"far fa-trash-alt\"></i></a>";
                          echo "</td>";
                          echo "</tr>";
                        }
                      }else{
                        echo "<tr>";
                        echo "<td colspan=\"3\" class=\"text-center\">No Records Found</td>";
                        echo "</tr>";
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>
                        <div class="row">
                          <div class="col-xs-12 text-right">
                            <button type="button" id="add-new-product-row" class="btn btn-info">
                              <i class="fas fa-plus"></i>
                            </button>
                            <button type="submit" name="submit" value="submit-products" id="save-details-button" class="btn btn-success">
                              <i class="far fa-save"></i>
                            </button>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tfoot>

                </table>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript" src="js/products-processing.js"></script>
<?php

  include("php/includes/footer.php");
  include("php/includes/scripts.php");
  include("php/includes/bottom.php");
?>
