<?php
  class Product extends DB{

    protected $table = "products";

    public function __construct(){
      parent::__construct();
    }

    public function deleteProduct($conditions = array(), $limit = null){
      $sql = "DELETE FROM " . $this->table . " ";

      if(isset($conditions) && !empty($conditions) && is_array($conditions) && count($conditions) > 0){
        $sql .= "WHERE ";
        $f = 0;
        foreach($conditions as $field => $condition){

          if($f > 0 && $f < count($conditions)){
            $sql .= " AND ";
          }

          $sql .= $field . " IN (";
          for($i=0; $i < count($condition); $i++){
            if($i == 0){
              $sql .= $condition[$i];
            }else{
              $sql .= ", " . $condition[$i];
            }
          }
          $sql .= ") ";

          $f++;
        }

        return $this->mysqli->query($sql);
      }
    }

    public function getProducts($fields = array(), $conditions = array(), $orderBy = array(), $limit = null, $offset=null){
      $sql = "SELECT ";
      if(isset($fields) && !empty($fields) && count($fields) > 0){
        for($i = 0; $i < count($fields); $i++){
          if($i == 0){
              $sql .= $fields[$i];
          }else{
            $sql .= ", " . $fields[$i];
          }
        }
      }else{
        $sql .= "* ";
      }

      $sql .= " FROM " . $this->table . " ";

      if(isset($conditions) && !empty($conditions) && count($conditions) > 0){
        $sql .= " WHERE ";

        for($i=0; $i < count($conditions); $i++){
          $sql .= $conditions[$i] . " ";
        }
      }

      if(isset($orderBy) && !empty($orderBy) && count($orderBy) > 0){
        $sql .= " ORDER BY ";

        $i = 0;
        foreach ($orderBy as $field => $order) {
          if($i == 0){
            $sql .= $field . " " . $order;
          }else{
            $sql .= ", " . $field . " " . $order;
          }

          $i++;
        }
      }

      if(isset($limit) && !empty($limit) && $limit > 0){
        $sql .= " LIMIT " . $limit;
      }

      if(isset($offset) && $offset >= 0){
        $sql .= " OFFSET " . $offset;
      }

      return $this->mysqli->query($sql);

    }
  }

?>
