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
                    $_SESSION["fecha"] = date("Y-m-d h:i:s");
                    //header("location:index.php?action=dashboard");
                    echo "<script>window.location.href = 'index.php?action=dashboard'</script>";
                }else{
                    //header("location:index.php?action=fallo");
                    //echo "<script>window.location.href = 'index.php?action=fallo'</script>";
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Error! Verifica tus credenciales.',
                              showConfirmButton: false,
                              timer:2000
                            },
                            function () {
                                window.location.href = 'index.php?action=fallo';
                                tr.hide();
                             });
                        </script>";
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
                    //echo "<script>alert('Usuario registrado exitosamente');</script>";
                    //echo "<script>window.location.href = 'index.php?action=usuarios'</script>";
                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Usuario registrado exitosamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=usuarios';
                                tr.hide();
                             });
                          </script>";
                }else{
                    //header("location:index.php?action=fallo");
                    //echo "<script>alert('Hubo un error al registrar el usuario');</script>";
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al registrar el usuario!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=usuarios';
                                tr.hide();
                             });
                        </script>";
                }

            }
        }

        public static function updateUserController($usr){
            if(isset($_POST["user"])){
                if ($_POST["privilegio"] == "User"){
                    $priv = 0;
                }else{
                    $priv = 1;
                }
                $tienda = DatosProd::getStoreByNameModel("tienda", $_POST["tienda"]);
                $datos = array( "nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"],
                    "usuario"=>$_POST["user"], "email"=>$_POST["email"], "privilegio"=>$priv, "tienda"=>$tienda["id"]);
                $respuesta =  new DatosProd();
                $r = $respuesta->updateUserModel("users",$datos, $usr);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($r){

                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Usuario actualizado exitosamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=usuarios';
                                tr.hide();
                             }
                            );
                          </script>";
                }else{

                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al actualizar el usuario!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=usuarios';
                                tr.hide();
                             });
                        </script>";
                }

            }
        }

        public static function registerSaleController(){
            if(isset($_POST["producto"]) && isset($_POST["cantidad"])){
                $prod = DatosProd::getProductByNameModel("productos", $_POST["producto"]);
                if ($_POST["cantidad"]<=$prod["cantidad_stock"]){
                    DatosProd::delStockModel("productos", $_POST["cantidad"], $prod["id"]);

                    $tienda = DatosProd::getStoreModel("tienda", $_SESSION["tienda"]);
                    $total = (int)$_POST["cantidad"] * $prod["precio_producto"];
                    $datos = array("fecha"=>date("Y-m-d h:i:s"), "producto"=>$_POST["producto"],"cantidad"=>$_POST["cantidad"],
                        "total"=>$total, "tienda"=>$tienda["id"]);
                    $respuesta =  new DatosProd();
                    $respuesta->registerSaleModel("ventas",$datos);
                    //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                    if($respuesta){
                        //session_start();
                        echo "<script>
                                    swal({
                                      type:'success',
                                      title: 'Venta registrada exitosamente!',
                                      showConfirmButton: false,
                                      timer:2500
                                    },
                                    function () {
                                        window.location.href = 'index.php?action=ventas';
                                        tr.hide();
                                     });
                                </script>";
                        //echo "<script>window.location.href = 'index.php?action=ventas'</script>";
                    }else{
                        echo "<script>
                                    swal({
                                      type:'error',
                                      title: 'Hubo un error al registrar la venta!',
                                      showConfirmButton: false,
                                      timer:2500
                                    },
                                    function () {
                                        window.location.href = 'index.php?action=ventas';
                                        tr.hide();
                                     });
                                </script>";

                    }
                }else{
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Stock insuficiente! No se completó la venta.',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=ventas';
                                tr.hide();
                             });
                        </script>";

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
				<td><a href="index.php?action=editarUsuario&usr='.$item["id"].'"><button class="btn btn-default" ><i class="right fa  fa-edit"></i></button></a>
				
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

        public static function getUserByNameController($usr){
		    $usrData = DatosProd::getUserByNameModel("users", $usr);

		    return $usrData;
        }

        public static function getUserByIdController($usr){
            $usrData = DatosProd::getUserByIdModel("users", $usr);

            return $usrData;
        }

        public static function registerCategoryController(){
            if(isset($_POST["nombre"]) && isset($_POST["descripcion"])){
                $datos = array( "nombre"=>$_POST["nombre"], "descripcion"=>$_POST["descripcion"], "date"=>date("Y-m-d h:i:s"));
                $respuesta =  new DatosProd();
                $respuesta->registerCategoryModel("categoria",$datos);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta){
                    //echo "<script>alert('Categoria registrada exitosamente');</script>";
                    //echo "<script>window.location.href = 'index.php?action=categorias'</script>";
                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Categoria registrada exitosamente!',
                              showConfirmButton: false,
                              timer:1500
                            },
                            function () {
                                window.location.href = 'index.php?action=categorias';
                                tr.hide();
                             });
                        </script>";
                }else{
                    //echo "<script>alert('Hubo un error al registrar la categoria');</script>";
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al registrar la categoria!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=categorias';
                                tr.hide();
                             });
                        </script>";
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
                    //echo "<script>alert('Tienda registrada exitosamente');</script>";
                    //echo "<script>window.location.href = 'index.php?action=tiendas'</script>";
                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Tienda registrada exitosamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=tiendas';
                                tr.hide();
                             });
                        </script>";
                }else{
                    //echo "<script>alert('Hubo un error al registrar la tienda');</script>";
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al registrar la tienda!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=tiendas';
                                tr.hide();
                             });
                        </script>";
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
                    //echo "<script>alert('Producto registrado exitosamente');</script>";
                    //echo "<script>window.location.href = 'index.php?action=inventario'</script>";
                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Producto registrado exitosamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=inventario';
                                tr.hide();
                             });
                        </script>";

                }else{
                    //header("location:index.php?action=fallo");
                    //echo "<script>alert('Hubo un error al registrar producto');</script>";

                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al registrar el producto!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=inventario';
                                tr.hide();
                             });
                        </script>";
                    
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
                    $usr = $_SESSION["usuario"];
                    $nota = "El usuario ".(string)$usr." ha agregado ".(string)$stock;
                    $date = date("Y-m-d h:i:s");
                    $addStock->historialAdd("historial", $idP, $nota, $usr, $date, $stock);
                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Stock actualizado correctamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=inventario';
                                tr.hide();
                             });
                        </script>";
                }else{

                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al actualizar el stock!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=inventario';
                                tr.hide();
                             });
                        </script>";
                }

            }
        }

        public static function delStockController(){
            if(isset($_POST["delStock"])){
                $stock = $_POST["delStock"];
                $idP = $_POST["idP"];
                $stockMod =  new DatosProd();
                $respuesta = $stockMod->delStockModel("productos",$stock, $idP);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta){
                    $usr = $_SESSION["usuario"];
                    $nota = "El usuario ".(string)$usr. " ha eliminado ".(string)$stock;
                    $date = date("Y-m-d h:i:s");
                    $stockMod->historialAdd("historial", $idP, $nota, $usr, $date, $stock);
                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Stock actualizado correctamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=inventario';
                                tr.hide();
                             });
                        </script>";
                }else{
                    //header("location:index.php?action=fallo");
                    //echo "<script>alert('Hubo un error al actualizar el stock');</script>";
                    //echo "<script>window.location.href = 'index.php?action=fallo'</script>";
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al actualizar el stock!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=inventario';
                                tr.hide();
                             });
                        </script>";
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

        public static function historyListController($idP){
            $respuesta = DatosProd::historyListModel("historial", $idP);

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

        public static function getSelectProductListController(){
            $respuesta = DatosProd::productsListModel("productos", $_SESSION["tienda"]);

            foreach($respuesta as $row => $item){
                echo '<option>'.$item["nombre"].'</option>';
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

        public static function getUserStoreListController(){
            $respuesta = DatosProd::storeListModel("tienda");

            return $respuesta;
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

        public static function salesListController(){
            $ventas = DatosProd::salesListModel("ventas", $_SESSION['tienda']);
            if(!empty($ventas)){

                foreach ($ventas as $row => $item) {
                    $tienda = DatosProd::getStoreModel("tienda", $item["id_tienda"]);
                    echo "<tr>";
                    echo "<td>".$item['id']."</td>";
                    echo "<td>".$item['fecha']."</td>";
                    echo "<td>".$item['productos_vendidos']."</td>";
                    echo "<td>".$item['cantidad']."</td>";
                    echo "<td>".$item['total']."</td>";
                    echo "<td>".$tienda['nombre']."</td>";
                    echo "<td>"."<a class='btn btn-danger fa fa-trash' href='index.php?action=eliminarVenta&idVenta=".$item['id']."'></a></td>";
                    echo "</tr>";
                }


            }
        }



	}


?>