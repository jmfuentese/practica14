<?php
if(!$_SESSION["validar"]){
    //header("location:index.php?action=ingresar");
    echo "<script>window.location.href='index.php?action=ingresar'</script>";
    exit();
}

?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid" style="padding: 40px;">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <h3 class="card-title" style="display: inline-block;">Usuarios</h3>
                        </div>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                            Agregar &nbsp&nbsp<i class="right fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Agregado</th>
                            <th>Privilegio</th>
                            <th>Tienda</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $vistaUsuario = new ProductsController();
                        $vistaUsuario -> userListController();
                        //$vistaUsuario -> borrarUsuarioController();
                        ?>

                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form action="" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el apellido">
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el nombre de usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="passwd">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Ingresa una contraseña" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Ingresa un correo electronico">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Privilegio</label>
                                <select name="privilegio" class="form-control select2" style="width: 100%;">
                                    <option >User</option>
                                    <option >Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Tienda</label>
                                <select name="tienda" class="form-control select2" style="width: 100%;">
                                    <?php
                                    $tiendas = new ProductsController();
                                    $tiendas -> getSelectStoreListController();
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
                <?php
                    $vistaUsuario -> registerUserController();
                ?>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modificar -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php
                    $vistaUsuario -> getUserController();

                    $crudUsuario = DatosProd::updateUserModel();
                ?>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Cambiar Contraseña -->
<div class="modal fade" id="modal-passwd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar contraseña</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method='post' role='form'>
                    <div class='box-body'>
                        <div class='form-group'>
                            <label for='nombre'>Nueva contraseña</label>
                            <input type='text' name='nueva' class='form-control' id='exampleInputEmail1'>
                        </div>
                        <div class='form-group'>
                            <label for='apellido'>Repite la contraseña</label>
                            <input type='text' name='nuevaR' class='form-control' id='exampleInputEmail1'>
                        </div>

                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Cerrar</button>
                        <button type='submit' class='btn btn-primary'>Actualizar contraseña</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


