<?php
	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
?>

<h1>REGISTRO DE PRODUCTO</h1>

<div class="row">
	<form method="post" class="col s12">
		<div class="row">
			<div class="input-field col s4 offset-m4">
				<input type="text" name="nombre" class="validate" required>
		     	<label for="last_name">Nombre del producto</label>
		    </div>
		</div>
		<div class="row">
			<div class="input-field col s4 offset-m4">
				<input type="text" name="descripcion" class="validate" required>
		     	<label for="last_name">Descripcion</label>
		    </div>
		</div>
		<div class="row">
			<div class="input-field col s4 offset-m4">
				<input type="text" name="precio_compra" class="validate" required>
		     	<label for="last_name">Precio de compra</label>
		    </div>
		</div>
	    <div class="row">
	    	<div class="input-field col s4 offset-m4">
				<input type="text" name="precio_venta" class="validate" required>
	     		<label for="last_name">Precio de venta</label>
	    	</div>
	    </div>
		<div class="row">
			<div class="input-field col s4 offset-m4">
				<input type="text" name="precio" class="validate" required>
	     		<label for="last_name">Precio</label>
	    	</div>
		</div>
		<button class="btn waves-effect waves-light" type="submit" name="registro">Enviar
			<i class="material-icons right">send</i>
		</button>
	</form>
</div>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new ProductsController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> productRegistrationController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
