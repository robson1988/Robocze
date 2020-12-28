<?php

class DietPrice extends Dbh {

  protected function getDietPrice($data_col, $kcal, $days) {  //kolumna w bazie, kalorie i dni z ktorych będzie brana cena

    $sql = "SELECT price FROM $data_col WHERE kcal = $kcal AND days = $days";

    print_r($sql);
  	$stmt = $this->connect()->prepare($sql);

  	$stmt->execute();

  	$count = $stmt->rowCount();


  	$this->connection = null;

  	if($count < 1) {

  		$row = '';
  		return $row;

  		} else {

  			$row = $stmt->fetch(PDO::FETCH_ASSOC);

  			$this->connection = null;
        print_r($row);
  			return $row;

  		}
  	}
  }
