<?php
    //session_start();
	if(!$_SESSION["validar"]){
		//header("location:index.php?action=ingresar");
        echo "<script>window.location.href='index.php?action=ingresar';</script>";
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
                            <h3 class="card-title" style="display: inline-block;">Productos</h3>
                        </div>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-agregar-producto">
                            Agregar &nbsp&nbsp<i class="right fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Agregado</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $vistaProductos = new ProductsController();
                        $vistaProductos -> productsListController();
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

<div class="modal fade" id="modal-agregar-producto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form action="" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nombre">Código</label>
                            <input type="text" name="codigo" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el codigo" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Precio</label>
                            <input type="text" name="precio" class="form-control" id="exampleInputEmail1" placeholder="Ingresa una descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Stock</label>
                            <input type="text" name="stock" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el stock inicial" required>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Categoria</label>
                                <select name="categoria" class="form-control select2" style="width: 100%;">
                                    <?php
                                    $categorias = new ProductsController();
                                    $categorias -> getSelectCategoryListController();
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
                $vistaProductos -> registerProductController();

                ?>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
