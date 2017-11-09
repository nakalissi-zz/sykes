<?php
if (empty($_GET['search'])) {
  header("Location: /?error=true"); // Redirect to home page
  exit();
}

require_once("views/header.php");

// Query string to search on search class
if ($_GET) {
  $result = $new_search->searchData($_GET);
} else {

}
?>
<div class="container">
  <hr class="divider">
  <a href="/" name="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
  <?php if ($result) {
    $data = $result->data;
    ?>
    <div id="search_container" class="row">

      <div class="col-sm-12">
        <h2><?php echo count($data); ?> Cottage(s) found</h2>
      </div>

      <?php
        // Loop in search array
        foreach ($data as $key => $value) {
      ?>
      <div class="col-sm-4 col-xs-12">
        <div class="thumbnail">

          <img src="http://www.bestholidaytips.co.uk/wp-content/uploads/2012/09/Holiday-Cottages-For-Rent.jpg" alt="<?php echo $value['property_name']; ?>" class="img-responsive">

          <div class="caption">
            <h4><?php echo $value['property_name']; ?>
              <small class="right">
                <?php if ($value['available'] == 1) {
                  echo '<span class="badge badge-pill badge-default"><i class="fa fa-star-o"></i> Available</span>';
                } else {
                  echo '<span class="badge badge-pill badge-default">Unavailable</span>';
                }?>
              </small>
            </h4>
            <h5><i class="fa fa-map-marker"></i> <?php echo $value['location_name']; ?></h5>

              <ul class="list-group">
                <?php if ($value['beds'] > 0) {
                  echo '<li class="list-group-item">'.$value['beds'].' Beds <span class="badge badge-pill badge-success"><i class="fa fa-bed"></i></span></li>';
                } ?>

                <?php if ($value['sleeps'] > 0) {
                  echo '<li class="list-group-item">'.$value['sleeps'].' Sleepers <span class="badge badge-pill badge-success"><i class="fa fa-users"></i></span></li>';
                } ?>

                <?php if ($value['near_beach'] == 1) {
                  echo '<li class="list-group-item">Near to the Beach <span class="badge badge-pill badge-info"><i class="fa fa-life-ring"></i></span></li>';
                } ?>

                <?php if ($value['accepet_pets'] == 1) {
                  echo '<li class="list-group-item">Pet Friendly <span class="badge badge-pill badge-info" title=""><i class="fa fa-paw"></i></span></li>';
                } ?>

              </ul>

            <a href="#" class="btn btn-block btn-success">Book</a>
          </div>
        </div>
      </div>
      <?
      }
      ?>
    </div>
  <? } else {
    echo "<h2>No cottages found</h2>";
  }?>

  <div class="row">
    <div class="col-sm-12">
      <?php require_once("views/pagination.php"); ?>
    </div>
  </div>
</div>
<?php require_once("views/footer.php"); ?>
<?php
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
 ?>
