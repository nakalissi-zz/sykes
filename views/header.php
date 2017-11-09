<?php
require_once("controllers/search.php");

$page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
// Initiate Search class
$new_search = new Search($page);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="" content="">
    <title>Sykes Search Page</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
