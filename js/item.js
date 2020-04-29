service_id = param = window.location.search.substring(1);

$.ajax({
	url: 'lib/get-store.php',
	method: 'POST',
	data: {service_id:service_id},
	cache: false,
	success: function(data){
		$('.card-title').text(data[0]['product_title']);
		$('.price').text('Strating Price $'+data[0]['product_price']);
		$('.card-text').html(data[0]['product_details']);
		$('.card-img-top').attr('src', 'img/product-image/'+data[0]['product_image']);;
	}
});

$.ajax({
	url: 'lib/get-store.php',
	method: 'POST',
	data: {reviews:service_id},
	cache: false,
	success: function(data){
		//<p>Lorem</p> <small class="text-muted">Posted</small> <hr>
		review = '';
		for(var i in data) {
			review += '<p>'+data[i]['review']+'</p> <small class="text-muted">Posted by '+data[i]['name']+' on '+data[i]['date']+'</small> <hr>'
		}
		review += '<a href="#leave_review" class="btn btn-success" see="0">Leave a Review</a>';

		$('.reviews').html(review);
	}
});

var options = {
    max_value: 5,
    step_size: 1,
    initial_value: 0,
    update_input_field_name: $("#rating_count"),
}

$(".rate").rate(options);
$(".rate").rate("setFace", 5, '😊');
$(".rate").rate("setFace", 1, '😒');

$(document).on('click', '.btn-success', function(event) {
	event.preventDefault();
	see = $(this).attr('see');

	if (see == 0) {
		$('.leave_reviews').show();
		$(this).attr('see', '1');		
	}else{
		$('.leave_reviews').hide();
		$(this).attr('see', '0');
	}
});

$('.submit_review').click(function(event) {
	$('.err_rev').text('Please Enter a Valid Order Number');
});