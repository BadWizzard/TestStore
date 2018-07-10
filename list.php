<?php
require_once 'Store.php';

$shop_type = isset($_GET['shop']) || $_GET['shop'] ? $_GET['shop'] : 'shopify';
$store = new Store($shop_type);
//$items = $store->get_items_by_type('underwear');
$items = $store->get_items_by_tag_an_type();
$categories = $store->get_categories();
?>
<div class="container">
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
								<?php foreach ($categories['product_type'] as $prod_type) { ?>
									<option value="<?=$prod_type?>"><?=$prod_type?></option>
								<?php }?>
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
								<?php foreach ($categories['tag'] as $tag) { ?>
									<option value="<?=$tag?>"><?=$tag?></option>
								<?php }?>
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
	<br><br>
	<div class="row">
		<?php foreach ($items as $item) { ?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="<?= $item['image']['src'] ?>" alt="...">
					<div class="caption">
						<h3><?= $item['title'] ?></h3>
						<?= $item['body_html'] ?>
						<p>
						<form>
							<input type="hidden" name="page" value="order">
							<input type="hidden" name="shop" value="<?=$shop_type?>">
							<div class="form-group">
								<select name="variant_id" class="form-control">
									<?php foreach ($item['variants'] as $variant) { ?>
										<option value="<?=$variant['id']?>"><?=$variant['title'].' $'.$variant['price']?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<button class="btn btn-primary">Make Order</button>
							</div>
						</form>
						</p>
					</div>
				</div>
			</div>
		<? } ?>
	</div>
</div>
<pre>
	<?= $store->json; ?>
</pre>
