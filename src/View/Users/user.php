<?php
  include '../../View/header.php';
?>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top:2%;">

            <div class="col-xl-5 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div >
                                <div class="p-4">
                                    <div class="text-center">
                                    <h6 class="m-b-20 p-b-5  f-w-600" style="margin-top:20px;">BIENVENIDO ADMIN Y/O RECEPCIONISTA</h6>
                                    </div>
                                    <form class="user" id="form_user" action="/View/Users/validation_users.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="user" class="form-control form-control-user"

                                                placeholder="Ingrese Usuario...">
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"

                                                placeholder="Ingrese Contraseña...">
                                        </div>
                                            <input type="submit" value="Enviar" class="btn btn-primary btn-user btn-block">

                                        </a>
                                        <hr>
                                       
                                    </form>
                                    
                                    
                                    <div class="text-center">
                                        <a class="small" href="../LoginDocumento/loginDocumento.php">Volver A Inicio</a>
                                    </div>

                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <footer class="sticky-footer ">
        <div class="container my-auto">
        <div class="copyright text-center" style="color:white;">
             <span>Alumnos ISFT177 &copy; 2022.</span>
        </div>
        </div>
    </footer>

    <?php
  require_once '../../View/footer.php';
?>