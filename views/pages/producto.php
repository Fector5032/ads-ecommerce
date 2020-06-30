<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row pt-3">
							<div class="col-6">
								<img src="static/images/small/img-2.jpg" class="img-fluid" alt="Responsive image">
							</div>
							<div class="col-6">
								<div class="h4">Producto 1</div>
								<div class="text-success pt-2"><?php echo MONEY; ?>50</div>
								<div class="pt-2 text-justify" style="height: 100px;">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolore aliquid quasi nesciunt doloribus harum deserunt laborum, cumque magnam tenetur veritatis itaque accusamus omnis unde ullam corrupti praesentium aspernatur! Quidem.
								</div>
								<form action="" action="POST">
									<input type="hidden" value="<?php echo $_GET['id']; ?>">
									<div class="row pt-5">
										<div class="col-6">
											<button type="button" id="remove" class="btn btn-warning d-inline" style="vertical-align: unset;">-</button>

											<input type="number" id="quantity" name="quantity" class="text-center form-control col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-inline" value="1" readonly>

											<button type="button" id="add" class="btn btn-warning d-inline" style="vertical-align: unset;">+</button>
										</div>
										<div class="col-6">
											<button class="btn btn-primary" type="submit">Agregar al carrito</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
