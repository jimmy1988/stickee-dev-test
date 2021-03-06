<?php

  require_once("functions.php");
  require_once("../class/import_classes.php");

  if(isset($_GET['ajax']) && !empty($_GET['ajax']) && $_GET['ajax'] == "true" && isset($_GET['a']) && !empty($_GET['a']) && $_GET['a'] > 0){

    $amountRequired = $_GET['a'];

    $products = new Product;

    $allProducts = $products->getProducts(array(), array(), array("product_box_qty" => "DESC"));
    $minAmount = $products->getProducts(array("product_box_qty"), array(), array("product_box_qty" => "ASC"), "1");

    if(
      isset($allProducts) && !empty($allProducts) && $allProducts->num_rows > 0 &&
      isset($minAmount) && !empty($minAmount) && $minAmount->num_rows > 0
    ){

      //get the results box box quantity desc and start dividing the box demominations in box qty order

      $minAmount = $minAmount->fetch_assoc()['product_box_qty'];
      $data = array();
      $newAmount = $amountRequired;
      while($row = $allProducts->fetch_assoc()){

        $thisBoxSize = array();
        $total = floor($newAmount / $row['product_box_qty']);
        if($total > 0){
          $thisBoxSize['box_qty'] = $row['product_box_qty'];
          $thisBoxSize['amount'] = $total;
        }else{
          $thisBoxSize['box_qty'] = $row['product_box_qty'];
          $thisBoxSize['amount'] = 0;
        }

        array_push($data, $thisBoxSize);

        $remainder = $amountRequired % $row['product_box_qty'];
        if($remainder > 0){
          $newAmount = $remainder;
        }else{
          $newAmount = 0;
        }

        if($minAmount == $row['product_box_qty'] && $newAmount > 0 && $newAmount < $minAmount){
          for($i = 0; $i < count($data); $i++){
            if($data[$i]['box_qty'] == $minAmount){
              $data[$i]['amount'] =   $data[$i]['amount'] + 1;
            }
          }
          break;
        }
      }
  
      for($i = count($data) - 1; $i > 0; $i--){
        $fieldToRefactor = $data[$i]['box_qty'] * $data[$i]['amount'];
        $amountToIncreaseTo = floor($fieldToRefactor / $data[$i-1]['box_qty']);
        $amountToMinus= floor($fieldToRefactor / $data[$i]['box_qty']);

        for($j = count($data) - 1; $j >= 0; $j--){
          if($fieldToRefactor == $data[$j]['box_qty'] && $amountToIncreaseTo > 0 && $amountToMinus > 0){
            $data[$j]['amount'] = $data[$j]['amount'] + $amountToIncreaseTo;
            $data[$i]['amount'] = $data[$i]['amount'] - $amountToMinus;
            break;
          }
        }
      }

    $response = getJSONResponse(true, array(), $data);

    echo $response;


    }else{
      echo getJSONResponse(true, array("No Data Found"), array());
    }

  }else{
    echo getJSONResponse(false, array("Invalid Data Submitted"), array());
  }
?>
