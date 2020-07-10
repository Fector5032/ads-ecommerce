const add = document.getElementById('add');
const remove = document.getElementById('remove');
const quantity = document.getElementById('quantity');

if (add != null) {
	add.addEventListener('click', function() {
		quantity.value = parseInt(quantity.value) + 1;
	});
}

if (remove != null) {
	remove.addEventListener('click', function() {
		value = parseInt(quantity.value);

		if (value != 1) {
			value = value - 1;
		}

		quantity.value = value;
	});
}
