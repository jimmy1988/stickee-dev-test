<?php
  function getJSONResponse($success = false, $messages = array(), $data = array()){
    $response = array(
      "success" => $success,
      "messages" => $messages,
      "data" => $data
    );
    return json_encode($response);
  }
?>
