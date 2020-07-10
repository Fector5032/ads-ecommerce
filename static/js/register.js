var register = document.getElementById('registro');

register.addEventListener('submit', function(e) {
	e.preventDefault();

	let form = new FormData(register);
	let url = 'index.php?page=registro';

	if (form.get('password') != form.get('confirmpassword')) {
		Swal.fire(
		  'Error al registrarse',
		  'Las contraseñas no coinciden',
		  'error'
		);
	} else {
		register.submit();
	}
});
