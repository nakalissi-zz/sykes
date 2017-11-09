<?php
require_once("connection.php");

class Search {

  public $page;
  public $start;
  public $limit; // How many items to show per page
  public $total;
  public $pdo;

  function __construct($page=1, $start=0, $limit=3){

    // Set new db connection
    $db           = new Database();
    $this->pdo    = $db->connect();

    // Pagination varaibles
    $this->page   = $page;
    $this->start  = ($page-1) * $limit; // First item to display;
    $this->limit  = $limit;

  }

  function searchData($params=""){

    // Get query string from form
    if ($params) {
      $this->search     = $params['search'];
      $this->location   = $params['locations'];
      $this->start_date = $params['start'];
      $this->end_date   = $params['end'];
    }

    $sql = "SELECT *, 1 as available FROM properties ";
    $sql .= "JOIN locations ON properties._fk_location = locations.__pk ";
    $sql .= "JOIN bookings ON bookings.__pk = properties.__pk WHERE ";

    // Check if search not empty
    if (!empty($this->search)) {
      $sql .= "property_name LIKE :search ";
    }

    // Check if location not empty
    if (!empty($this->location)) {
      $sql .= "AND properties._fk_location = :location ";
    }

    // Check if start_date and end_date not empty
    if (!empty($this->start_date) && !empty($this->end_date)) {
      $sql .= "AND :start_date NOT BETWEEN start_date AND end_date ";
      $sql .= "AND :end_date NOT BETWEEN start_date AND end_date ";
    }

    $sql .= "ORDER BY properties.property_name ASC ";

    $sql .= "LIMIT :start, :limit";

    $pdo = $this->pdo;
    $result = $pdo->prepare($sql);

    // Check if search not empty to bind sql value
    if (!empty($this->search)) {
      $result->bindValue(':search', '%'.$this->search.'%', PDO::PARAM_STR);
    }

    // Check if location not empty to bind sql value
    if (!empty($this->location)) {
      $result->bindValue(':location', $this->location, PDO::PARAM_STR);
    }

    // Check if start_date and end_date not empty to bind sql values
    if (!empty($this->start_date) && !empty($this->end_date)) {
      $result->bindValue(':start_date', $this->start_date, PDO::PARAM_STR);
      $result->bindValue(':end_date', $this->end_date, PDO::PARAM_STR);
    }

    // Check init and end pagination
    $result->bindValue(':start', $this->start, PDO::PARAM_INT);
    $result->bindValue(':limit', $this->limit, PDO::PARAM_INT);

    if ($result->execute()) {
      // Display all found results
      $this->data = $result->fetchAll();
      $this->total = $result->rowCount();
      return $this;
    }

    $pdo->close();

  }

  function totalSearch(){

    try {

      $sql = "SELECT * FROM properties ";
      $sql .= "JOIN locations ON properties._fk_location = locations.__pk ";
      $sql .= "JOIN bookings ON bookings.__pk = properties.__pk WHERE ";

      // Check if search not empty
      if (!empty($this->search)) {
        $sql .= "property_name LIKE :search ";
      }

      // Check if location not empty
      if (!empty($this->location)) {
        $sql .= "AND properties._fk_location = :location ";
      }

      // Check if start_date and end_date not empty
      if (!empty($this->start_date) && !empty($this->end_date)) {
        $sql .= "AND :start_date NOT BETWEEN start_date AND end_date ";
        $sql .= "AND :end_date NOT BETWEEN start_date AND end_date ";
      }

      $sql .= "ORDER BY properties.property_name ASC ";

      $pdo = $this->pdo;
      $result = $pdo->prepare($sql);

      // Check if search not empty to bind sql value
      if (!empty($this->search)) {
        $result->bindValue(':search', '%'.$this->search.'%', PDO::PARAM_STR);
      }

      // Check if location not empty to bind sql value
      if (!empty($this->location)) {
        $result->bindValue(':location', $this->location, PDO::PARAM_STR);
      }

      // Check if start_date and end_date not empty to bind sql values
      if (!empty($this->start_date) && !empty($this->end_date)) {
        $result->bindValue(':start_date', $this->start_date, PDO::PARAM_STR);
        $result->bindValue(':end_date', $this->end_date, PDO::PARAM_STR);
      }

      if ($result->execute()) {

        // Count total found rows
        $this->total = $result->rowCount();
        return $this->total;
      }

      $pdo->close();

    } catch (Exception $e) {
      return $e;
    }

    // Close connection
    $pdo->close();

  }

  function locations(){

    try {
      // Get all locations
      $sql = "SELECT * FROM locations";

      $pdo = $this->pdo;
      $result = $pdo->prepare($sql);
      $result->execute();

      if ($result->execute()) {
         return $result->fetchAll();
      } else {
         return "No locations found.";
      }

    } catch (Exception $e) {
      return $e;
    }

    // Close connection
    $pdo->close();

  }

}

?>
