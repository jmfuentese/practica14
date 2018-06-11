<?php

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
                    <h1>Ventas</h1>
                    <div>
                        <a class="btn btn-success" href="index.php?action=vender">Nueva <i class="fa fa-plus"></i></a>
                    </div>
                    <br>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Número</th>
                            <th>Fecha</th>
                            <th>Productos vendidos</th>
                            <th>Total</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($ventas as $venta){ ?>
                            <tr>
                                <td><?php echo $venta->id ?></td>
                                <td><?php echo $venta->fecha ?></td>
                                <td>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach(explode("__", $venta->productos) as $productosConcatenados){
                                            $producto = explode("..", $productosConcatenados)
                                            ?>
                                            <tr>
                                                <td><?php echo $producto[0] ?></td>
                                                <td><?php echo $producto[1] ?></td>
                                                <td><?php echo $producto[2] ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </td>
                                <td><?php echo $venta->total ?></td>
                                <td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
</div>
</section>
</div>