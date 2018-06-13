<?php
//Se valida la sesion del usuario, de lo contrario se redirige a la pantalla de ingreso
if(!$_SESSION["validar"]){
    //header("location:index.php?action=ingresar");
    echo "<script>window.location.href='index.php?action=ingresar';</script>";
    exit();
}
$vistaVentas = new ProductsController();
?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid" style="padding: 40px;">
            <div class="card">
                <div class="card-header">
                    <h1>Ventas</h1>
                    <div>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-vender">Nueva &nbsp<i class="fa fa-plus"></i></button>
                    </div>
                    <br>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Número</th>
                            <th>Fecha</th>
                            <th>Producto vendido</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Tienda</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //listado de ventas

                        $vistaVentas->salesListController();
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

<div class="modal fade" id="modal-vender">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar venta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form role="form" style="width: 450px;" method="post">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="producto">Producto</label>
                            <br>
                            <select name="producto" style="width: 410px;" class="form-control select2 select2-hidden-accessible" required>

                                <?php
                                $vistaVentas -> getSelectProductListController();
                                ?>

                            </select>

                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control"  name="cantidad" required>
                            </div>

                        </div>

                        <div class="card-footer">


                            <br>
                            <button type="submit" class="btn btn-success" style="width: 150px;" name="guardar">Registrar Venta</button>
                            <button type="submit" class="btn btn-danger" style="width: 150px;" name="guardar"><a
                                        href="index.php?action=ventas" style="color:white;">Cancelar Venta</a></button>

                        </div>

                        <?php

                        $vistaVentas -> registerSaleController();

                        ?>



                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->