<?php
  !defined("AUTHOR") ? define("AUTHOR", "James McHugh") : "";
  !defined("AUTHOR_CONTACT_NUMBER") ? define("AUTHOR_CONTACT_NUMBER", "07922955332") : "";
  !defined("AUTHOR_WEBSITE") ? define("AUTHOR_WEBSITE", "") : "";
  !defined("AUTHOR_EMAIL") ? define("AUTHOR_EMAIL", "james.mchugh1988@gmail.com") : "";
  !defined("APP_NAME") ? define("APP_NAME", "Stickee Dev Test") : "";

  $addressArray = array(
    'Address 1' => "",
    'Address 2' => "",
    'City' => "",
    'Postcode' => "",
    'Country' => ""
  );

  !defined("CONTACT_INFO") ? define("CONTACT_INFO", $addressArray) : "";

  !defined("DB_HOST") ? define("DB_HOST", "localhost") : "";
  !defined("DB_USER") ? define("DB_USER", "stickeedevtestusr") : "";
  !defined("DB_PASS") ? define("DB_PASS", "pqilcqtXRFb59JsB") : "";

  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS);
?>
