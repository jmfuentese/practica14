<?php
if(!$_SESSION["validar"]){
    //header("location:index.php?action=ingresar");
    echo "<script>window.location.href='index.php?action=ingresar'</script>";
    exit();
}
if ($_SESSION["privilegio"] != 1){
    echo "<script>window.location.href='index.php?action=dashboard'</script>";
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
                            <h3 class="card-title" style="display: inline-block;">Tiendas</h3>
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
                            <th>Activa</th>
                            <th>Agregado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $vistaCategoria = new ProductsController();
                        $vistaCategoria -> storeListController();
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
                <h4 class="modal-title">Agregar nueva tienda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form action="" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el nombre" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
                <?php
                $vistaCategoria -> registerStoreController();

                ?>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->