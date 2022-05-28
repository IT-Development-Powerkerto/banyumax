$(function(){
	$('#product_name').change(function(){
		var product = $('#product_name').val();
		$.ajax({
			url: "get_product/"+product,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				$('#price').val(data);
			}
		});
		$('#product_promotion_id').empty();
		$('#product_promotion_id').append(`<option hidden>Select Promotion</option>`);
		$('#product_promotion_id').append(`<option value="">Not Have Promotion</option>`);

		$('#add_product_promotion_id').empty();
		$('#add_product_promotion_id').append(`<option hidden>Select Promotion</option>`);
		$('#add_product_promotion_id').append(`<option value="">Not Have Promotion</option>`);

		$('#shipping_promotion_id').empty();
		$('#shipping_promotion_id').append(`<option hidden>Select Promotion</option>`);
		$('#shipping_promotion_id').append(`<option value="">Not Have Promotion</option>`);

		$('#add_shipping_promotion_id').empty();
		$('#add_shipping_promotion_id').append(`<option hidden>Select Promotion</option>`);
		$('#add_shipping_promotion_id').append(`<option value="">Not Have Promotion</option>`);

		$('#admin_promotion_id').empty();
		$('#admin_promotion_id').append(`<option hidden>Select Promotion</option>`);
		$('#admin_promotion_id').append(`<option value="">Not Have Promotion</option>`);

		$('#add_admin_promotion_id').empty();
		$('#add_admin_promotion_id').append(`<option hidden>Select Promotion</option>`);
		$('#add_admin_promotion_id').append(`<option value="">Not Have Promotion</option>`);
		$.ajax({
			url: "get_promotion_list/"+product,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				console.log(data);
				$.each(data.product_promotion, function(key, value){
					$('#product_promotion_id').append(`<option value="${value.id}">${value.promotion_name}</option>`);
					$('#add_product_promotion_id').append(`<option value="${value.id}">${value.promotion_name}</option>`);
				});

				$.each(data.shipping_promotion, function(key, value){
					$('#shipping_promotion_id').append(`<option value="${value.id}">${value.promotion_name}</option>`);
					$('#add_shipping_promotion_id').append(`<option value="${value.id}">${value.promotion_name}</option>`);
				});

				$.each(data.admin_promotion, function(key, value){
					$('#admin_promotion_id').append(`<option value="${value.id}">${value.promotion_name}</option>`);
					$('#add_admin_promotion_id').append(`<option value="${value.id}">${value.promotion_name}</option>`);
				});
			}
		});
	});
});
