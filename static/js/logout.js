const logout = document.getElementById('logout');

logout.addEventListener('click', function(e) {
	e.preventDefault();

	let url = 'views/pages/logout.php';

	fetch(url, {
		method: 'POST',
		body: JSON.stringify({
			'logout': true,
		}),
		headers: {
	    	'Accept': 'application/json',
	    	'Content-Type': 'application/json'
		}
	})
	.then(response => {
		if (response.ok) {
			return response.json();
		} else {
			throw "Error en la petición";
		}
	})
	.then(data => {
		if (data.logout == true) {
			window.location.href = "index.php";
		} else {
			alert("error al cerrar sesión");
		}
	})
	.catch(error => {
		console.log(error);
	});

});
