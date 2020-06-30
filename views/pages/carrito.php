<div class="wrapper">
    <div class="container-fluid">                
        <div class="row">
            <div class="col-12">
            	<?php 
            		require_once 'views/components/breadcrumb.php';

            		echo breadcrumb(True, False, False);
            	?>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
	                                <tr>
	                                    <th>Imagen</th>
	                                    <th>Producto</th>
	                                    <th>Cantidad</th>
	                                    <th>Precio</th>
	                                    <th></th> 
	                                </tr>
                                </thead>
                                <tbody>
	                                <tr>
	                                    <td class="product-list-img">
	                                        <img src="static/images/products/1.jpg" class="img-fluid thumb-md rounded" alt="tbl">
	                                    </td>
	                                    <td>
	                                        <h6 class="mt-0 mb-1">Producto 1</h6>
	                                        <p class="m-0 font-14">Descripcion del producto 1.</p>
	                                    </td>
	                                    <td>5</td>
	                                    <td><?php echo MONEY; ?>521</td>
	                                    <td>
	                                        <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remover producto"><i class="mdi mdi-close font-18"></i></a>
	                                    </td>
	                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
</div>
