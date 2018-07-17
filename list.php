<?php include 'header.php'; ?>
<?php
require_once 'Store.php';
$store = new Store();
$items = $store->get_all_items();
?>
<script>
	var products = <?=json_encode($items)?>;
</script>
<div class="modal" id="mymodal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h2 style="font-weight: 700" id="prod-title"></h2>
				<p id="prod-desc"></p>
			</div>
			<div class="modal-footer">
				<form>
					<input type="hidden" name="page" value="order">
					<input type="hidden" name="shop" value="">
					<input type="hidden" name="variant_id" value="">
					<button type="submit" class="btn btn-primary prod-buy">Buy for $<span id="prod-price"></span></button>
				</form>

			</div>
		</div>
	</div>
</div>
<div class="desktophd">
	<div style="height: 100%; position:relative; margin:auto;">
		<div class="header">
			<div class="ee">EE</div>
			<img class="oval" src="./desktophd_files/desktop hdoval.png">
			<div class="rectanglecopy"></div>
			<div class="event2018vipexper">EVENT 2018<br>VIP EXPERIENCES</div>
		</div>
		<div class="vippackages">VIP PACKAGES</div>

		<div class="packages">
			<div class="package">
				<div class="date"><div class="day">FRIDAY</div>
					<span class="sub_date">August 17</span></div>
				<div class="package-items">
					<?php $i = 0;
					foreach ($items as $item) { ?>
						<div class="group2copy">
							<div class="rectanglecopy33"></div>
							<div class="goldbuckle1"><?= $item['title'] ?>﻿</div>
							<div class="onticketmastercom3">on ticketmaster.com</div>
							<div class="miscbigbuttoncopy5 buy-button">
								<div class="background7"></div>
								<button class="upgarde4 upgrade-btn" js-index="<?=$i++;?>" data-toggle="modal" data-target="#mymodal" style="border: 0;">$<?=$item['price']?> Upgrade Now</button>
							</div>
							<div class="miscbigbuttoncopy43 buy-button">
								<div class="background8"></div>
								<div class="buy3">$699 with ticket</div>
							</div>
							<div class="rectangle5copy1"></div>
							<div class="rectangle5copy41"></div>
							<div class="rectangle5copy51"></div>
						</div>
					<? } ?>
				</div>
				<div class="comparepackages">Compare packages</div>
			</div>
		</div>

		<div class="footer">
			<div class="group4">
				<div class="rectanglecopy5"></div>
				<div class="rectanglecopy51"></div>
				<div class="signupandlearnab">Sign up and learn about upcoming VIP events first!</div>
				<div class="email">Email</div>
				<div class="miscbigbuttoncopy8">
					<button class="background13"></button>
					<div class="upgarde7">Sign Up</div>
				</div>
			</div>
			<div class="contact-us-block">
				<div class="dontseesomethingy">DONT SEE SOMETHING YOU LIKE?</div>
				<div class="miscbigbuttoncopy">
					<button class="button-contact">
						<div class="upgarde">Contact Us</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="" method="get">
				<input type="hidden" name="page" value="list">
				<div class="form-group">
					<div class="row">
						<div class="col-xs-3">
							Product Type
						</div>
						<div class="col-xs-9">
							<select name="product_type" class="form-control">
								<?php /*foreach ($categories['product_type'] as $prod_type) { */?>
									<option value="<?/*=$prod_type*/?>"><?/*=$prod_type*/?></option>
								<?php /*}*/?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-3">
							Tag
						</div>
						<div class="col-xs-9">
							<select name="tag" class="form-control">
								<?php /*foreach ($categories['tag'] as $tag) { */?>
									<option value="<?/*=$tag*/?>"><?/*=$tag*/?></option>
								<?php /*}*/?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>-->

<script>
	console.log(<?php print_r($store->json); ?>);
</script>
