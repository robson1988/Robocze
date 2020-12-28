<?php

class Dbh {
  private $db_host ="localhost";
  private $db_user = "root";
  private $db_pass ="";
  private $db_name = "fitbox_nowa";

  protected function connect() {
    $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
    $pdo = new PDO($dsn, $this->db_user, $this->db_pass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
}
