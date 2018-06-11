<?php
include 'models/status.php';
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
                    <h1>Vender</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="index.php?action=agregarAlCarrito">
                        <label for="codigo">Código de barras:</label>
                        <input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
                    </form>
                    <br><br>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Precio de venta</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Quitar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($_SESSION["carrito"] as $indice => $producto){
                            $granTotal += $producto->total;
                            ?>
                            <tr>
                                <td><?php echo $producto->id ?></td>
                                <td><?php echo $producto->codigo ?></td>
                                <td><?php echo $producto->descripcion ?></td>
                                <td><?php echo $producto->precioVenta ?></td>
                                <td><?php echo $producto->cantidad ?></td>
                                <td><?php echo $producto->total ?></td>
                                <td><a class="btn btn-danger" href="<?php echo "index.php?action=quitarDelCarrito&indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <h3>Total: <?php echo $granTotal; ?></h3>
                    <form action="index.php?action=terminarVenta" method="POST">
                        <input name="total" type="hidden" value="<?php echo $granTotal;?>">
                        <button type="submit" class="btn btn-success">Terminar venta</button>
                        <a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
                    </form>
                </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
</div>
</section>
</div>