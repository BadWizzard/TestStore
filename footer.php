<script
	src="https://code.jquery.com/jquery-2.2.4.min.js"
	integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
	crossorigin="anonymous">
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
	$('.upgrade-btn').click(function () {
		var modal = $('#mymodal');
		var product = products[Number($(this).attr('js-index'))];
		modal.find('#prod-title').text(product.title);
		modal.find('#prod-desc').html(product.description);
		modal.find('#prod-price').text(product.price);
		modal.find('[name=shop]').val(shop);
		modal.find('[name=variant_id]').val(product.id_variant);
	})
</script>
</body>
</html>