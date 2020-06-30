<div class="wrapper">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-8 col-lg-6 col-xl-5">
				<div class="card">
					<div class="card-body">
						<div class="pt-3">
                            <p class="text-muted text-center mb-4">Ingresa el correo electronico de tu cuenta para poder recuperar tu contraseña</p>
                            <form class="form-horizontal" action="" method="POST">
                				<div class="form-group">
                                    <label for="nombres">Correo electornico</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="example@server.com" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>">        
                                </div>            
                                <div class="mt-4">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Enviar mensaje</button>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
