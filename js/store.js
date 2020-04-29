serviceName = window.location.pathname.split('/')[2];
if (serviceName == 'web-development') {
	$('.service-name').text("Web Development");
	service = 'web';
}else if (serviceName == 'digital-marketing') {
	$('.service-name').text("Digital Marketing");
	service = 'marketing';
}else if (serviceName == 'automation') {
	service = 'automation';
	$('.service-name').text("Web Automation");
}

console.log(service);

$.ajax({
	url: 'lib/get-store.php',
	method: 'POST',
	data: {service:service,all:'all'},
	cache: false,
	success: function(data){
		slider = '';
		productItem = '';
		for(var i in data) {
			if (i == 0) {
				slider += '<div class="carousel-item active"> <img class="d-block img-fluid" src="img/product-image/'+data[i]['product_image']+'" alt="First slide"> </div>';
			}else{
				slider += '<div class="carousel-item"> <img class="d-block img-fluid" src="img/product-image/'+data[i]['product_image']+'" alt="First slide"> </div>';
			}

			productItem += '<div class="col-lg-4 col-md-6 mb-4"> <div class="card h-100"> <a href="item?'+data[i]['id']+'"><img class="card-img-top" src="img/product-image/'+data[i]['product_image']+'" alt=""></a> <div class="card-body"> <h4 class="card-title"> <a href="item?'+data[i]['id']+'">'+data[i]['product_title']+'</a> </h4> <h5>$'+data[i]['product_price']+'</h5> <p class="card-text">'+data[i]['product_short_details']+'</p> </div> <div class="card-footer"> <small class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</small> </div> </div> </div>';
		}
		$('.carousel-inner').html(slider);
		$('#productItem').html(productItem);
	}
});
