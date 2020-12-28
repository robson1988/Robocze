<?php
if(!empty($_POST['item_action'])) {

	session_start();

	include_once "../../Classes/db.class.php";
	include_once "../../Classes/DietPrice.class.php";
	include_once "../../Classes/ShowDietPrice.class.php";
	include_once "../../Classes/sanitize.class.php";

  switch($_POST['item_action']) {
	 case 'add':

		$security = new Sanitize();

		$diet  = $security -> sanitizeInput($_POST['item_id']);
		$kcal = $security ->sanitizeInput($_POST['item_kcal']);
		$meals = $security ->sanitizeInput($_POST['item_meals']);
		$days = $security ->sanitizeInput($_POST['item_days']);

		$dietPrice = new ShowDietPrice;
		$dietPrice->viewDietPrice($diet, $kcal, $meals, $days);

		if(!empty($_POST['item_diet']) && !empty($kcal) && !empty($days)) {
		$itemArray = array($_POST['item_diet'] => array('id' => $diet,'name' => $_POST['item_diet'], 'img' => $_POST['item_img'], 'meals' => $meals, 'kcal' => $kcal, 'days' => $days, 'price' => $_SESSION['diet-price'], 'quantity' => '1'));

  	if(!empty($_SESSION['cart-item'])) {
			$cartCodeArray = array_keys($_SESSION['cart-item']);
			if(in_array($_POST['item_diet'], $cartCodeArray)) {

					foreach($_SESSION['cart-item'] as $k => $v) {
						if($_POST['item_diet'] == $k) {
							$_SESSION['cart-item'][$k]['quantity'] = $_SESSION['cart-item'][$k]['quantity'] + 1;
						}
				}

		} else {
			$_SESSION['cart-item'] = array_merge($_SESSION['cart-item'], $itemArray);
		}
		} else {
			$_SESSION['cart-item'] = $itemArray;
		}
	}

    break;

  case 'remove':
	if(!empty($_SESSION['cart-item'])) {
		foreach($_SESSION['cart-item'] as $k => $v) {
				if($_POST['item_delete'] == $k."-cart")
					unset($_SESSION['cart-item'][$k]);
				if(empty($_SESSION['cart-item']))
					unset($_SESSION['cart-item']);
		}
	}
    break;
  }
}

  if(isset($_SESSION['cart-item'])) {
		$itemQuantity = 0;
		$itemTotal = 0;
    ?>
		<table class="table table-striped mb-0">
			<h2 class="order-heading text-center"><i class="fas fa-shopping-cart pr-2"></i>Koszyk</h2>
			<thead>
					<tr class="d-flex">
							<th class="col-1"></th>
							<th class="text-left pl-0 col-3 amount">Dieta</th>
							<th class="text-center col-1 amount">Ilość</th>
							<th class="text-center col-2 amount">Kcal</th>
							<th class="text-center col-2 amount">Dni</th>
							<th class="text-center col-2 amount">Cena</th>
							<th class="col-1"></th>
					</tr>
			</thead>
		<tbody>
			<?php
				foreach($_SESSION['cart-item'] as $item) {
			 ?>
			<tr class="d-flex" id="<?php echo $item['name']; ?>-cart">
	        <td class="col-1"><img src="<?php echo $item['img']; ?>" class="img-fluid thumbnail-image"/> </td>
	        <td class="col-3 text-left pl-0"><?php $dietName = trim($item['name'], '0123456789'); echo $dietName; ?></td>
					<td class="col-1 text-center quantity"><?php echo $item['quantity']; ?></td>
					<td class="col-2 text-center quantity"><?php echo $item['kcal']; ?></td>
	        <td class="col-2 text-center quantity"><?php echo $item['days']; ?></td>
	        <td class="col-2 total-amount text-center"><?php echo $item['price']; ?> zł</td>
	        <td class="col-1 text-center">
						<button class="btn btn-sm btn-danger" onClick="removeFromCart('remove','<?php echo $item['name']; ?>-cart')"><i class="fa fa-trash"></i>
						</button>
					</td>
	    </tr>
			<?php

			$itemTotal += $item['quantity'] * $item['price'];
			$itemQuantity += $item['quantity'];

			}
			?>

		</tbody>
	</table>

		<!-- === Suma === -->
		<div class="row m-0 mt-4 summary-one">
			<div class="col-5"></div>
			<div class="col-4">
				<h4 class="pl-3 amount">Suma</h4>
			</div>

			<div class="col-3 text-right">
					<p class="amount"><?php echo $itemTotal; ?> zł</p>
			</div>
	  </div>

	  <!-- === Rabat === -->
		<div class="row m-0 summary-two">
			<div class="col-5"></div>
			<div class="col-4">
				<h4 class="pl-3 amount">Rabat</h4>
			</div>
			<div class="col-3 text-right">
					<p class="amount"> 0 zł</p>
			</div>
		</div>

	  <!-- === Do zapłaty === -->
		<div class="row m-0 mt-3 summary-three">
			<div class="col-5"></div>
			<div class="col-4">
				<h3 class="pl-3 amount">Do zapłaty</h3>
			</div>
			<div class="col-3 text-right">
					<p class="amount-total"><?php echo $itemTotal; ?> zł</p>
			</div>
		</div>
	<div class="row m-0">
		<div class="col-7 ml-auto">
			<form action="" method="post">
				<input type="hidden" class='total' name="total" value="<?php echo $itemTotal; ?>" />

				<div class="slide-in-checkout">
					<a href="" title="Przejdz dalej" class="btn btn-checkout" aria-pressed="true">Przejdź dalej</a>
					<div class="slide-eff-checkout"></div>
				</div>
			</form>
		</div>
	</div>

    <?php
  } else {
		?>
		<table class="table table-striped">
			<h2 class="order-heading text-center"><i class="fas fa-shopping-cart pr-2"></i>Koszyk</h2>
			<thead>
				<tr class="d-flex">
					<td class="col-12 text-center">Twój koszyk jest pusty...</td>
				</tr>
			</thead>
		</table>
		<?php
	}
