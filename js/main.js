$('.upgrade-btn').click(function () {
	var modal = $('#mymodal');
	var product = products[Number($(this).attr('js-index'))];
	modal.find('#prod-title').text(product.title);
	modal.find('#prod-desc').html(product.description);
	modal.find('#prod-price').text(product.price);
	modal.find('[name=variant_id]').val(product.id_variant);
});