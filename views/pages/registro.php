<?php 
    require_once 'controllers/clienteController.php';

    $cliente = new ClientesController();
    if (isset($_POST['nombres'])) {
        $registro = $cliente->create_client($_POST['nombres'], $_POST['apellidos'], $_POST['email'], $_POST['username'], $_POST['confirmpassword']);

        if ($registro === True) {
            echo '<script>window.location.href = "index.php"</script>';
        }
    }
?>
<div class="wrapper">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-8 col-lg-6 col-xl-5">
				<div class="card">
					<div class="card-body">
						<div class="pt-3">
                            <p class="text-muted text-center mb-4">Registrate para poder comprar el producto que desees</p>
                            <form id="registro" class="form-horizontal" action="" method="POST" autocomplete="off">
                				<div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>        
                                </div>
                                <div class="form-group">
                                    <label for="useremail">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>        
                                </div>
                                <div class="form-group">
                                    <label for="useremail">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>        
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>        
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">Confirmar contraseña</label>
                                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirmar contraseña" required>        
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success btn-block waves-effect waves-light">Registrarse</button>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

