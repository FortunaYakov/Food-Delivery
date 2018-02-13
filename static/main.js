$(document).ready(function() {
	$('input.add').click(function(e) {
		e.preventDefault();
		var prodId = $(this).parent().children('.count')[0].value;

		$.ajax({
			url: '/index.php?r=/cart/add',
			data: { id: prodId },
			method: 'POST'
		}).done(function(res) {
			var countCell = $('#product-count-' + prodId);
			var prodCount = parseInt(countCell.html()) + 1;
			countCell.html(prodCount);

			$('#total-' + prodId).html(prodCount * $('#price-' + prodId).html())

			var totalValue = 0;
			$('.total').each(function() {
				totalValue += Number($(this).html());
			})

			$('#global-total').html(totalValue);
		}).fail(function (err) {
			console.log(err);
		});
	});

	$('input.substract').click(function(e) {
		e.preventDefault();
		var prodId = $(this).parent().children('.count')[0].value;

		$.ajax({
			url: '/index.php?r=/cart/substract',
			data: { id: prodId },
			method: 'POST'
		}).done(function(res) {
			var countCell = $('#product-count-' + prodId);
			var prodCount = parseInt(countCell.html()) - 1;

			if (prodCount === 0) {
				$('#product-' + prodId).remove();
			} else {
				countCell.html(prodCount);
				$('#total-' + prodId).html(prodCount * $('#price-' + prodId).html())
			}

			var totalValue = 0;
			$('.total').each(function() {
				totalValue += Number($(this).html());
			})

			$('#global-total').html(totalValue);
		}).fail(function (err) {
			console.log(err);
		});
	});
});
