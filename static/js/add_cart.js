const add_cart = document.getElementsByClassName('add_cart');

for (var i = 0; i < add_cart.length; i++) {
	add_cart[i].addEventListener("click", function() {
		// e.preventDefault();
		let product = this.dataset.product;
		console.log(product);
	});
}

var product = document.getElementById('add_product');
// console.log(product);
if (product != null) {
	product.addEventListener('submit', function(e) {
		e.preventDefault();
		// alert('hola');
		let data = new FormData(product);
		let url = 'index.php?page=add_product';

		fetch(url, {
			method: 'POST',
			body: data
		})
		.then(response => response.json())
		.then(data => {
			console.log(data);
			if (data.status == true) {
				Swal.fire(
					data.message,
					'',
					'success'
				);
			}
		})
	});
}

var remove_cart = document.getElementsByClassName('remove-cart-product');

for (let i = 0; i < remove_cart.length; i++) {
	remove_cart[i].addEventListener('click', function(e) {
		e.preventDefault();

		let producto = this.dataset.product;
		let action = this.dataset.action;
		let cantidad = this.dataset.quantity;
		let pedido = this.dataset.order;
		let precio = this.dataset.price;

		let url = 'index.php?page=add_product';

		fetch(url, {
			method: 'POST',
			body: JSON.stringify({
				'producto': producto,
				'action': action,
				'cantidad': cantidad,
				'pedido': pedido,
				'precio': precio,
			}),
			headers: {
		    	'Accept': 'application/json',
		    	'Content-Type': 'application/json'
			}
		})
		.then(response => response.json())
		.then(data => {
			if (data.status == true) {
				Swal.fire({
					title: data.message,
					text: "",
					icon: 'success',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Ok'
				}).then((result) => {
					if (result.value) {
						location.reload();
					}
				});
			}
		});
	});
}

var payment_form =  document.getElementById('payment-form');

if (payment_form != null) {
	payment_form.addEventListener('submit', function(e) {
		e.preventDefault();

		let data = new FormData(payment_form);
		let url = 'index.php?page=add_product';

		fetch(url, {
			method: 'POST',
			body: data
		})
		.then(response => response.json())
		.then(data => {
			if (data.status == true) {
				Swal.fire({
					title: data.message,
					text: "",
					icon: 'success',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Ok'
				}).then((result) => {
					if (result.value) {
						window.location.href = 'index.php?page=pago';
					}
				});
			}
		})
		// console.log(data.get('direccion'));

		// alert("pago");
	});
}


