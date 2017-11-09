<?php require_once("views/header.php");
?>

    <div class="container">

      <div class="jumbotron">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2>Search for next holiday cottages</h2>
          </div>

        </div>
        <hr class="divider">
        <div class="row">

            <form name="search"  class="inline-form" id="search" action="results.php?page=" method="get">

              <fieldset>

                <div class="col-sm-12">
                  <?php if (!empty($_GET['error'])) { ?>
                    <div class="alert alert-danger">
                      Fill out the mandatory fields.
                    </div>
                  <?php } ?>
                </div>

                <div class="col-sm-12">
                  <div class="form-group<?php if(!empty($_GET['error'])) echo ' has-error'; ?>">
                    <label for="search">Cottages</label>
                    <input type="text" name="search" value="" class="form-control" placeholder="Type the cottage">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="locations">Where?</label>
                    <select class="form-control" name="locations">
                      <option value=""></option>
                      <?php
                      $locations = $new_search->locations();
                      foreach ($locations as $index => $value) {
                        echo "<option value=".$value['__pk'].">".$value['location_name']."</option>";
                      }
                     ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="date" value="" name="start" class="form-control" placeholder="Start Date">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="date" value="" name="end" class="form-control" placeholder="End Date">
                  </div>
                </div>

                <div class="col-sm-12">
                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i> Search</button>
                </div>

              </fieldset>
            </form>

        </div>
      </div>
    </div>

<?php require_once("views/footer.php"); ?>
