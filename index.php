<?php include 'header.php'; ?>

	<p class="text-center">
		<a href="/index.php?page=list&shop=shopify" class="btn btn-primary" role="button">Shopify Store</a>
		<a href="/index.php?page=list&shop=ecwid" class="btn btn-default" role="button">Ecwid Store</a>
	</p>

<?php
if (isset($_GET['page'])) {
	include $_GET['page'] . '.php';
}
include 'footer.php';
?>