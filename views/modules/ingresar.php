<div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Inventarios</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar sesion</p>

                <form  method="post">
                    <div class="form-group has-feedback">
                        <input name="usuario" type="text" class="form-control" placeholder="Usuario" required>
                        <span class="fa fa-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                        <span class="fa fa-lock form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="text-center col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" name="registro">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php

                    $ingreso = new ProductsController();
                    $ingreso -> loginController();
                    if(isset($_GET["action"])){
                        if($_GET["action"] == "fallo"){
                            echo "Fallo al ingresar";
                        }
                    }

                ?>
                <!--<p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>-->
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- iCheck -->
    <script src="../views/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass   : 'iradio_square-blue',
                increaseArea : '20%' // optional
            })
        })
    </script>

<!--
<h1>INGRESAR</h1>

	<div class="row">
		<form method="post" class="col s12">
			<div class="row">
				<div class="input-field col s4 offset-m4">
					<input type="text" name="user" class="validate" required>
			     	<label for="last_name">Usuario</label>
			    </div>
			</div>
			<div class="row">
				<div class="input-field col s4 offset-m4">
					<input type="password" name="pass" class="validate" required>
			     	<label for="last_name">Contraseña</label>
			    </div>
			</div>
			<button class="btn waves-effect waves-light" type="submit" name="registro">Entrar
				<i class="material-icons right">arrow_forward</i>
			</button>

		</form>
	</div>
	
-->
