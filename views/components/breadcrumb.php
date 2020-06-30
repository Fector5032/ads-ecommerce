<?php 
	function breadcrumb($carrito = False, $envio = False, $confirmacion = False) {
		if ($carrito === True && $envio === False && $confirmacion === False) {
			$breadcrumb = '<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a style="color: #0D3524;">Productos</a></li>
						    <li class="breadcrumb-item"><a>Envio y Pago</a></li>
						    <li class="breadcrumb-item">Confirmación</li>
						</ol>';	
		}

		if ($carrito === True && $envio === True && $confirmacion === False) {
			$breadcrumb = '<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a style="color: #0D3524;">Productos</a></li>
						    <li class="breadcrumb-item"><a style="color: #0D3524;">Envio y pago</a></li>
						    <li class="breadcrumb-item">Confirmación</li>
						</ol>';	
		}

		if ($carrito === True && $envio === True && $confirmacion === True) {
			$breadcrumb = '<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a style="color: #0D3524;">Productos</a></li>
						    <li class="breadcrumb-item"><a style="color: #0D3524;">Envio y Pago</a></li>
						    <li class="breadcrumb-item"><a style="color: #0D3524;">Confirmación</a></li>
						</ol>';	
		}

		return $breadcrumb;
	}
?>

