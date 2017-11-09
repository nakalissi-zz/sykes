<?php
  // get total cottages
  $get_vars = $_GET;
  foreach ($get_vars as $key => $value) {
    if ($key == "page") {
      unset($get_vars[$key]);
    }
  }
  $params = http_build_query($get_vars);

  //Setup page vars for display.
  $prev = $page - 1; // previous page is current page - 1
  $next = $page + 1; // next page is current page + 1
  $total = $new_search->totalSearch(); // total search items
  $limit = $new_search->limit; // get limit from search controller
  $lastpage = ceil($total/$limit); //number of pages

  /* Pagination */
  $pagination = "";
  if($lastpage > 1){

    $pagination .= "<ul class=\"pagination\">";
    // prev button
    if ($page > 1) {
      $pagination.= "<li><a href=\"results.php?page=$prev&$params\">Prev</a></li>";
    }

    for ($counter = 1; $counter <= $lastpage; $counter++)
    {
      if ($counter == (INT)$page)
        $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
      else
        $pagination.= "<li><a href=\"results.php?page=$counter&$params\">$counter</a></li>";
    }

    // next button
    if ($page < $counter - 1)
    $pagination.= "<li><a href=\"results.php?page=$next&$params\">next</a></li>";
    else
    $pagination.= "";
    $pagination.= "</ul>\n";
  }

  echo $pagination;

?>
