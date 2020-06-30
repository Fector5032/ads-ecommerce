<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
                <?php 
                    require_once 'views/components/breadcrumb.php';

                    echo breadcrumb(True, True, False);
                ?>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-7">
                                    <div class="form-group row">
                                        <label for="linea_1" class="col-sm-2 col-form-label">Dirección 1</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="linea1" name="linea1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="linea_2" class="col-sm-2 col-form-label">Dirección 2</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="linea2" name="linea2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ciudad" class="col-sm-2 col-form-label">Ciudad</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="ciudad" name="ciudad">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="region" class="col-sm-2 col-form-label">Municipio</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="region" name="region">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="pais" class="col-sm-2 col-form-label">Pais</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="pais" name="pais">
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" style="resize: unset; height: 150px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="postal" class="col-sm-2 col-form-label">Codigo postal</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="postal" name="postal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group row">
                                        <label for="tarjeta" class="col-sm-4 col-form-label">Tarjeta</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="tarjeta" name="tarjeta">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cvc" class="col-sm-4 col-form-label">CVC</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="cvc" name="cvc">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="vencimiento" class="col-sm-4 col-form-label">Fecha vencimiento</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="vencimiento" name="vencimiento">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="index.php?page=pago" class="btn btn-success btn-icon">
                                            <span class="btn-icon-label"><i class="ion ion-md-cart mr-2"></i></span>Realizar Pago
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>         
            </div>
		</div>
	</div>
</div>
