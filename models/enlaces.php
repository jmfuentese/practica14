<?php 

class Pages{
	
	public static function linkPagesM($link){


		if($link == "ingresar" || $link == "inventario" || $link == "editarUsuario" || $link == "salir" || $link == "dashboard"
            || $link == "usuarios" || $link == "categorias" || $link == "stock-historial" || $link == "borrarProducto"
            || $link == "borrarCategoria" || $link == "borrarUsuario" || $link == "borrarTienda" || $link == "tiendas"
            || $link == "vender" || $link == "ventas" || $link == "agregarAlCarrito" || $link == "quitarDelCarrito"
            || $link == "terminarVenta" || $link == "cancelarVenta" || $link == "eliminarVenta"){

			$module =  "views/modules/".$link.".php";
		
		}

		else if($link == "index"){

			$module =  "views/modules/registro.php";
		
		}

		else if($link == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($link == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($link == "cambio"){

			$module =  "views/modules/usuarios.php";
		
		}

		else{

			$module =  "views/modules/404.html";

		}
		return $module;

	}

}

?>