<?php 
	require_once './controllers/clienteController.php';

	$perfiles = new ClientesController();
	$perfil = $perfiles->get_info_client($_SESSION['id']);
?>
<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<?php 
							if (isset($_POST['linea1'])) {
								// var_dump($_POST);
								// var_dump($_SESSION['id']);
								$edit = $perfiles->edit_info_client($_POST, $_SESSION['id']);
								// var_dump($edit);
								if ($edit === True) {
									echo '<script>window.location.href = "index.php?page=perfil"</script>';
								}
							}
						?>
						<form action="" method="POST" autocomplete="off">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
	                                    <label for="nombres">Nombres</label>
	                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" value="<?php echo $perfil['nombres']; ?>" required>       
	                                </div>
	                                <div class="form-group">
	                                    <label for="useremail">Apellidos</label>
	                                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $perfil['apellidos']; ?>" required>        
	                                </div>
	                                <div class="form-group">
	                                    <label for="useremail">Email</label>
	                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@server.com" value="<?php echo $perfil['email']; ?>" required>        
	                                </div>
	                                <div class="form-group">
	                                    <label for="username">Username</label>
	                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $perfil['username']; ?>" required>
	                                </div>
	        
	                                <div class="form-group">
	                                    <label for="password">Contraseña</label>
	                                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" value="<?php echo ClientesController::Decryption($perfil['password']); ?>" required>
	                                </div>
	                                <div class="form-group">
	                                    <label for="userpassword">Confirmar contraseña</label>
	                                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirmar contraseña" value="<?php echo ClientesController::Decryption($perfil['password']); ?>" required>        
	                                </div>
								</div>
								<div class="col-6">
									<div class="form-group">
                                        <label for="linea_1">Dirección 1</label>
                                        <input class="form-control" type="text" id="linea1" name="linea1" value="<?php echo $perfil['linea1']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="linea_2">Dirección 2</label>
                                        <input class="form-control" type="text" id="linea2" name="linea2" value="<?php echo $perfil['linea2']; ?>">
                                    </div>
                                    <div class="row">
	                                    <div class="form-group col-6">
	                                        <label for="ciudad">Municipio</label>
	                                        <input class="form-control" type="text" id="municipio" name="municipio" value="<?php echo $perfil['municipio']; ?>" required>
	                                    </div>
	                                    <div class="form-group col-6">
	                                        <label for="region">Departamento</label>
	                                        <input class="form-control" type="text" id="departamento" name="departamento" value="<?php echo $perfil['departamento']; ?>" required>
	                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Refencia</label>
                                        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" style="resize: unset; height: 115px;" required><?php echo $perfil['referencia']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="postal">Codigo postal</label>
                                        <input class="form-control" type="text" id="postal" name="postal" value="<?php echo $perfil['codigo_postal']; ?>" required>
                                    </div>
								</div>
								<div class="col-12 text-center">
									<button type="submit" class="btn btn-warning btn-icon">
                                        <span class="btn-icon-label"><i class="fas fa-pencil-alt mr-2"></i></span> Editar perfil
                                    </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
