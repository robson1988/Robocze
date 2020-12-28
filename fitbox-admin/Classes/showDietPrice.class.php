<?php

class ShowDietPrice extends DietPrice {

	public function viewDietPrice($diet, $kcal, $meals, $days) {

    if($diet =='klasyczna' || $diet =='wegetariańska' || $diet =='bezryb' ) {
  		$data_col = 'dieta_'.$meals.'_posilek'; //kolumna z bazy która wybierzemy

		} elseif($diet == 'start') {
        $data_col = 'dieta_startowa'; //kolumna z bazy która wybierzemy
      } else {
				if($diet =='cukrzykow' || $diet =='dla-mam' || $diet =='bezglutenowa' || $diet =='hashimoto' ) {
					$data_col = 'dieta_cukrzykow';
				} else {
					$data_col = 'dieta_'.$diet; //kolumna z bazy która wybierzemy
				}
      }

		$row = $this->getDietPrice($data_col, $kcal, $days);

		if(empty($row)) {

			$result = 'Nie ma ceny';
			return $result;

		} else {

		$_SESSION['diet-price'] = $row['price'];

		}
  }
}
