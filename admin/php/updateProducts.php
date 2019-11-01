<?php
  include("includes/session.php");
  if(isset($_POST) && !empty($_POST) && isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "submit-products"){
    include("../../php/class/import_classes.php");

    $product = new Product;

    $errors = array();
    $success = array();

    if(isset($_POST['product_id']) && !empty($_POST['product_id']) && is_array($_POST['product_id']) && count($_POST['product_id']) > 0 && isset($_POST['product_name']) && !empty($_POST['product_name']) && is_array($_POST['product_name']) && count($_POST['product_name']) > 0 && isset($_POST['product_box_qty']) && !empty($_POST['product_box_qty']) && is_array($_POST['product_box_qty']) && count($_POST['product_box_qty']) > 0){

      for($i = 0; $i < count($_POST['product_id']); $i++){
        $productExistsResult = $product->getProducts(array(), array("product_id = " . $_POST['product_id'][$i]));

        if($productExistsResult && $productExistsResult->num_rows > 0){
          $fieldsValuesToSet = array(
            "product_name" => $_POST['product_name'][$i],
            "product_box_qty" => $_POST['product_box_qty'][$i],
          );
          $conditions = array("product_id = " . $_POST['product_id'][$i]);
          $productUpdated = $product->updateProduct($fieldsValuesToSet, $conditions);

          if($productUpdated){
            array_push($success, "Product Updated Sucessfully");
          }else{
            array_push($errors, "Product Update Failed");
          }
        }else{
          array_push($errors, "Cannot Find Record");
        }
      }

    }else{
      $messages = array(
        "success" => array(),
        "error" => array("Invalid data submitted, canmt extract the data")
      );

      $_SESSION['messages'] = $messages;
      header("location:../index.php");
    }

    if(isset($_POST['new_product_name']) && !empty($_POST['new_product_name']) && is_array($_POST['new_product_name']) && count($_POST['new_product_name']) && isset($_POST['new_product_box_qty']) && !empty($_POST['new_product_box_qty']) && is_array($_POST['new_product_box_qty']) && count($_POST['new_product_box_qty'])){

      for($i=0;$i<count($_POST['new_product_name']);$i++){
        $productExistsResult = $product->getProducts(array(), array("product_box_qty = " . $_POST['new_product_box_qty'][$i], " AND product_name = " . $_POST['new_product_name'][$i]));
        if(!$productExistsResult || $productExistsResult->num_rows == 0){

          $itemsToAdd = array(
            'product_name' => $_POST['new_product_name'][$i],
            'product_box_qty' => $_POST['new_product_box_qty'][$i]
          );
          $createProduct = $product->createProduct($itemsToAdd);

          if($createProduct){
            array_push($success, "Record Added successfully");
          }else{
            array_push($errors, "Unable to add record, unknown error");
          }
        }else{
          array_push($errors, "Cannot add this record as it already exists");
        }
      }
    }

    $messages = array(
      "success" => $success,
      "error" => $errors
    );

    $_SESSION['messages'] = $messages;
    header("location:../index.php");

  }else{
    $messages = array(
      "success" => array(),
      "error" => array("Incorrect Data Submitted,  the records could not be processed")
    );

    $_SESSION['messages'] = $messages;
    header("location:../index.php");
  }
?>
