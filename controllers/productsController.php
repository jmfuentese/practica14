<?php

	class ProductsController{

		public function template(){
			include "views/template.php";
		}

		public function productsLinks(){
			if(isset($_GET["action"])){
				$link = $_GET["action"];

			}else{
				$link = "index";
			}

			$resp = Pages::linkPagesM($link);

			include $resp;
		}


		public static function productRegistrationController(){
			if(isset($_POST["registro"])){
				$data = array("nombre" => $_POST["nombre"],"descripcion"=>$_POST["descripcion"],"precio_compra"=>$_POST["precio_compra"], "precio_venta"=>$_POST["precio_venta"],"precio"=>$_POST["precio"]);
				$resp = DatosProd::productRegistrationModel("productos",$data);

				if($resp == "1"){
					//header("location: index.php?action=ok");
                    echo "<script>window.location.href = 'index.php?action=ok'</script>";
				}else{
					//header("location: index.php");
                    echo "<script>window.location.href = 'index.php'</script>";
				}
			}

		}

		public static function loginController(){
            if(isset($_POST["usuario"])){
                $datos = array( "usuario"=>$_POST["usuario"], "password"=>md5($_POST["password"]));
                $respuesta = DatosProd::loginModel("users",$datos);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta["usuario"] == $_POST["usuario"] && $respuesta["password"] == md5($_POST["password"])){
                    //session_start();
                    $_SESSION["validar"] = true;
                    $_SESSION["usuario"] = $_POST["usuario"];
                    $_SESSION["password"] = $_POST["password"];
                    $_SESSION["privilegio"] = $respuesta["privilegio"];
                    $_SESSION["tienda"] = $respuesta["id_tienda"];
                    //header("location:index.php?action=dashboard");
                    echo "<script>window.location.href = 'index.php?action=dashboard'</script>";
                }else{
                    //header("location:index.php?action=fallo");
                    echo "<script>window.location.href = 'index.php?action=fallo'</script>";
                }

            }
		}

		public static function registerUserController(){
            if(isset($_POST["user"]) && isset($_POST["password"])){
                if ($_POST["privilegio"] == "User"){
                    $priv = 0;
                }else{
                    $priv = 1;
                }
                $tienda = DatosProd::getStoreByNameModel("tienda", $_POST["tienda"]);
                $datos = array( "nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"],
                    "usuario"=>$_POST["user"], "password"=>$_POST["password"], "email"=>$_POST["email"], "date"=>date("Y-m-d h:i:s"),
                    "privilegio"=>$priv, "tienda"=>$tienda["id"]);
                $respuesta =  new DatosProd();
                $respuesta->registerUserModel("users",$datos);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta){
                    //session_start();
                    echo "<script>alert('Usuario registrado exitosamente');</script>";
                    echo "<script>window.location.href = 'index.php?action=usuarios'</script>";
                }else{
                    //header("location:index.php?action=fallo");
                    echo "<script>alert('Hubo un error al registrar el usuario');</script>";
                    //echo "<script>window.location.href = 'index.php?action=fallo'</script>";
                }

            }
        }

		public static function userListController(){
            $respuesta = DatosProd::userListModel("users");

            foreach($respuesta as $row => $item){
                if ($item["privilegio"] == 0){
                    $priv = "User";
                }else{
                    $priv = "Admin";
                }
                $tienda = DatosProd::getStoreModel("tienda", $item["id_tienda"]);
                echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["first_name"].'</td>
				<td>'.$item["last_name"].'</td>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["user_email"].'</td>
				<td>'.$item["date_added"].'</td>
				<td>'.$priv.'</td>
				<td>'.$tienda["nombre"].'</td>
				<td><a href="#"><button class="btn btn-default" data-toggle="modal" data-target="#modal-edit">
				                                                            <i class="right fa  fa-edit"></i></button></a>
				
				<a href="index.php?action=borrarUsuario&idUsuario='.$item["id"].'"><button class="btn btn-danger"><i class="right fa fa-trash"></i></button></a></td>
			</tr>';

            }
        }

        public static function getUserController(){
            echo "<form method='post' role='form'>
                      <div class='box-body'>
                          <div class='form-group'>
                              <label for='nombre'>Nombre</label>
                              <input type='text' name='nombre' class='form-control' id='exampleInputEmail1' value=''>
                          </div>
                          <div class='form-group'>
                              <label for='apellido'>Apellido</label>
                              <input type='text' name='apellido' class='form-control' id='exampleInputEmail1' value=''>
                          </div>
                          <div class='form-group'>
                              <label for='usuario'>Usuario</label>
                              <input type='text' name='user' class='form-control' id='exampleInputEmail1' value='' required>
                          </div>
                          <div class='form-group'>
                              <label for='email'>Email</label>
                              <input type='email' name='email' class='form-control' value=''>
                          </div>
      
                      </div>
                      <div class='modal-footer'>
                          <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Cerrar</button>
                          <button type='submit' class='btn btn-primary'>Actualizar usuario</button>
                      </div>
                  </form>";
        }

        public static function registerCategoryController(){
            if(isset($_POST["nombre"]) && isset($_POST["descripcion"])){
                $datos = array( "nombre"=>$_POST["nombre"], "descripcion"=>$_POST["descripcion"], "date"=>date("Y-m-d h:i:s"));
                $respuesta =  new DatosProd();
                $respuesta->registerCategoryModel("categoria",$datos);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta){
                    echo "<script>alert('Categoria registrada exitosamente');</script>";
                    echo "<script>window.location.href = 'index.php?action=categorias'</script>";
                }else{
                    echo "<script>alert('Hubo un error al registrar la categoria');</script>";
                }

            }
        }

        public static function registerStoreController(){
            if(isset($_POST["nombre"])){
                $datos = array( "nombre"=>$_POST["nombre"], "date"=>date("Y-m-d h:i:s"));
                $respuesta =  new DatosProd();
                $respuesta->registerStoreModel("tienda",$datos);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta){
                    echo "<script>alert('Tienda registrada exitosamente');</script>";
                    echo "<script>window.location.href = 'index.php?action=tiendas'</script>";
                }else{
                    echo "<script>alert('Hubo un error al registrar la tienda');</script>";
                }

            }
        }

        public static function registerProductController(){
            if(isset($_POST["nombre"]) && isset($_POST["precio"])){
                $category = DatosProd::getCategoryByNameModel("categoria", $_POST["categoria"]);
                $tienda = DatosProd::getStoreByNameModel("tienda", $_POST["tienda"]);
                $datos = array( "codigo"=>$_POST["codigo"], "nombre"=>$_POST["nombre"], "precio"=>$_POST["precio"], "stock"=>$_POST["stock"],
                                        "categoria"=>$category["id_categoria"],"date"=>date("Y-m-d h:i:s"), "tienda"=>$tienda["id"]);
                $respuesta =  new DatosProd();
                $respuesta->registerProductModel("productos",$datos);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta){
                    //session_start();
                    echo "<script>alert('Producto registrado exitosamente');</script>";
                    echo "<script>window.location.href = 'index.php?action=inventario'</script>";
                }else{
                    //header("location:index.php?action=fallo");
                    echo "<script>alert('Hubo un error al registrar producto');</script>";
                    //echo "<script>window.location.href = 'index.php?action=fallo'</script>";
                }

            }
        }

        public static function addStockController(){
            if(isset($_POST["addStock"])){

                $stock = (int)$_POST["addStock"];
                $idP = $_POST["idP"];

                $addStock =  new DatosProd();
                $respuesta = $addStock->addStockModel("productos",$stock, $idP);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta){
                    //session_start();
                    //$addStock->historialAdd("historial",$idP, $nota, $usr, $date, $stock);
                    echo "<script>alert('Stock actualizado exitosamente');</script>";
                    echo "<script>window.location.href = 'index.php?action=inventario'</script>";
                }else{
                    //header("location:index.php?action=fallo");
                    echo "<script>alert('Hubo un error al actualizar el stock');</script>";
                    //echo "<script>window.location.href = 'index.php?action=fallo'</script>";
                }

            }
        }

        public static function delStockController(){
            if(isset($_POST["delStock"])){
                $stock = $_POST["delStock"];
                $idP = $_POST["idP"];
                $respuesta =  new DatosProd();
                $respuesta->delStockModel("productos",$stock, $idP);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta){
                    //session_start();
                    echo "<script>alert('Stock actualizado exitosamente');</script>";
                    echo "<script>window.location.href = 'index.php?action=inventario'</script>";
                }else{
                    //header("location:index.php?action=fallo");
                    echo "<script>alert('Hubo un error al actualizar el stock');</script>";
                    //echo "<script>window.location.href = 'index.php?action=fallo'</script>";
                }

            }
        }

        public static function categoryListController(){
            $respuesta = DatosProd::categoryListModel("categoria");

            foreach($respuesta as $row => $item){
                echo'<tr>
				<td>'.$item["id_categoria"].'</td>
				<td>'.$item["nombre_categoria"].'</td>
				<td>'.$item["descripcion_categoria"].'</td>
				<td>'.$item["date_added"].'</td>
				<td>
				<a href="index.php?action=borrarCategoria&idCategoria='.$item["id_categoria"].'"><button class="btn btn-danger"><i class="right fa fa-trash"></i></button></a></td>
			</tr>';

            }
        }

        public static function storeListController(){
            $respuesta = DatosProd::storeListModel("tienda");

            foreach($respuesta as $row => $item){
                if ($item["activa"]==1){
                    $act = "Si";
                }else{
                    $act = "No";
                }
                echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$act.'</td>
				<td>'.$item["date_added"].'</td>
				<td>
				<a href="index.php?action=borrarTienda&idTienda='.$item["id"].'"><button class="btn btn-danger" ><i class="right fa fa-trash"></i></button>
				<a href="index.php?action=activar&id='.$item["id"].'"><button class="btn btn-info" ><i class="right fa fa-gear"></i></button></a>
				</td>
			</tr>';

            }
        }

        public static function historyListController(){
            $respuesta = DatosProd::historyListModel("categoria");

            foreach($respuesta as $row => $item){
                $product = DatosProd::getProductModel("productos", $item["id_producto"]);
                echo'<tr>
                        <td>'.$item["id"].'</td>
                        <td>'.$product["nombre"].'</td>
                        <td>'.$item["nota"].'</td>
                        <td>'.$item["usuario"].'</td>
                        <td>'.$item["fecha"].'</td>
                        <td>'.$item["cantidad"].'</td>
                    </tr>';

            }
        }

        public static function getSelectCategoryListController(){
            $respuesta = DatosProd::categoryListModel("categoria");

            foreach($respuesta as $row => $item){
                echo '<option>'.$item["nombre_categoria"].'</option>';
            }
        }

        public static function getSelectStoreListController(){
            $respuesta = DatosProd::storeListModel("tienda");

            foreach($respuesta as $row => $item){
                echo '<option>'.$item["nombre"].'</option>';
            }
        }

        public static function productsListController(){
            $respuesta = DatosProd::productsListModel("productos", $_SESSION["tienda"]);

            foreach($respuesta as $row => $item){
                $categoria = DatosProd::getCategoryModel("categoria", $item["id_categoria"]);
                $tienda = DatosProd::getStoreModel("tienda", $item["id_tienda"]);
                echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["codigo_producto"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["date_added"].'</td>
				<td>'.$item["precio_producto"].'</td>
				<td>'.$item["cantidad_stock"].'</td>
				<td>'.$categoria["nombre_categoria"].'</td>
				<td>'.$tienda["nombre"].'</td>
				<td><a href="index.php?action=agregarStock&idProducto='.$item["id"].'"><button class="btn btn-default"><i class="right fa  fa-edit"></i></button></a>
				<a href="index.php?action=borrarProducto&idProducto='.$item["id"].'" data-tip="Eliminar"><button class="btn btn-danger"><i class="right fa fa-trash"></i></button></a></td>
			</tr>';

            }
        }


	}


?>