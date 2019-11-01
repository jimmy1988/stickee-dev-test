<?php
  include("includes/session.php");
  if(isset($_GET['d']) && !empty($_GET['d']) && $_GET['d'] == true && isset($_GET['p']) && !empty($_GET['p'])){
    include("../../php/class/import_classes.php");

    $product = new Product;

    $thisProduct = $product->getProducts(array(), array("product_id = " . $_GET['p']), array(), $limit = "1");

    if($thisProduct->num_rows > 0){

      $conditions = array(
        "product_id" => array($_GET['p'])
      );

      $productDeleted = $product->deleteProduct($conditions);

      if($productDeleted){
        $messages = array(
          "success" => array("Record deleted successfully"),
          "error" => array()
        );

        $_SESSION['messages'] = $messages;
        header("location:../index.php");
      }else{
        $messages = array(
          "success" => array(),
          "error" => array("Unable to delete record")
        );

        $_SESSION['messages'] = $messages;
        header("location:../index.php");
      }

    }else{
      $messages = array(
        "success" => array(),
        "error" => array("Invalid id submitted")
      );

      $_SESSION['messages'] = $messages;
      header("location:../index.php");
    }
  }else{
    $messages = array(
      "success" => array(),
      "error" => array("Incorrect Data Submitted,  the record could not be processed")
    );

    $_SESSION['messages'] = $messages;
    header("location:../index.php");
  }

?>
