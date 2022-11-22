<?php 
 //   print_r($_SESSION);

   // if(!isset($_SESSION["var_id"]))
   // {
    //    header("Location: logout.php");
    //}

    include '../../View/Admin/header.php';
    include '../../Controller/Person.php';
    include '../../Controller/Admin.php';
 
    //$session_user = AdminDao::getAdmin($_POST['username']);
// $resultado = array();

// if ($resultado = PersonController::Listar()){
//     print_r(json_encode($resultado));
// }
    
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1><strong>Bienvenido    </strong><?php echo $_SESSION["var_id"][1]; ?></h1>
                    <h1 class="h3 mb-2 text-gray-800">Turnos</h1>
                    <p class="mb-4">Permisos habilitados para acceder a los turnos<a target="_blank"
                            href="#"></a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Información de los Turnos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th style="width:180px;">DNI</th>
                                        <th style="width:180px;">Nombre</th>
                                        <th style="width:120px;">Apellido</th>
                                        <th style="width:120px;">Generos</th>
                                        <th style="width:120px;">Fecha Examen</th>
                                        <th style="width:120px;">Tipo de Examen</th>
                                        <th style="width:120px;">Condicion</th>
                                        <th style="width:120px;">Editar</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody> 
                                       

                                    <?php foreach(PersonController::Listar() as $r) : ?>
                                        <tr>
                                            <td><?php echo $r->dni_number; ?></td>
                                            <td><?php echo $r->name; ?></td>
                                            <td><?php echo $r->surname; ?></td>
                                            <td><?php echo $r->gender; ?></td>
                                            <td><?php echo (date("d/m/Y H:i", strtotime($r->date_time))); ?></td>
                                            <td><?php echo $r->type_test; ?></td>
                                            <td><?php echo $r->detail; ?></td>
                                            <td>
                                                <a href="edit_person.php?dni_number=<?php echo $r->dni_number; ?>">Editar</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Alumnos ISFT177 &copy; 2022.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Desea Salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar Sesión" a continuación si está listo para cerrar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <?php 
    include '../../View/Admin/footer.php'

    
?>
