<?php

session_start();

if(!$_SESSION["validar"]){

    header("location:index.php?action=ingresar");

    exit();

}
$vistaEditarUsuario = new ProductsController();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>

            </div>
        </div>
    </section>


    <section class="content" style="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">

                    <div class="card card-white">

                        <div class="card-header">
                            <h1 class="card-title">Modificar Usuario</h1>

                            <div class="card-tools">

                                <a href="index.php?action=usuarios"><button type="button" class="btn btn-tool"><i class="fa fa-remove"></i></button></a>
                            </div>
                        </div>
                        <?php

                            $usr = $_GET["usr"];
                            $usrData = $vistaEditarUsuario->getUserByIdController($usr);

                        ?>
                        <form role="form" style="" method="post">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" placeholder="" name="nombre" value="<?php echo $usrData["first_name"]?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control"  placeholder="" name="apellido" value="<?php echo $usrData["last_name"]?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" class="form-control"  placeholder="" name="user" value="<?php echo $usrData["usuario"]?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="privilegio">Privilegio</label>
                                    <select name="privilegio" class="form-control select2" >
                                        <option>Admin</option>
                                        <option>User</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="correo">Email</label>
                                    <input type="text" class="form-control"  placeholder="" name="email" value="<?php echo $usrData["user_email"]?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="tienda">Tienda</label>
                                    <br>
                                    <select name="tienda" style="" class="form-control select2 select2-hidden-accessible" required>


                                        <?php
                                            $tienda = $vistaEditarUsuario->getUserStoreListController();
                                            foreach($tienda as $row => $item){
                                                if ($item["id"] == $usrData["id_tienda"]) {
                                                    echo '<option selected>'.$item["nombre"].'</option>';
                                                }
                                                else
                                                {
                                                    echo '<option>'.$item["nombre"].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" style="width: 150px;" name="modificar">Modificar</button>

                            </div>
                            </div>


                        </form>
                        <?php
                            $vistaEditarUsuario->updateUserController($usr);
                        ?>
                    </div>
                    <div class="col-md-6">
                        <img src="views/dist/img/user.png" style="padding:40px 20px 20px 160px;" />
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>