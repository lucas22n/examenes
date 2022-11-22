<?php 
    include '../../View/Admin/header.php';
    include '../../Controller/Person.php';
    include '../../Controller/Admin.php';
    include '../../Controller/Test.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1><strong>Exámenes </strong></h1>
                    <?php if($_SESSION["user"]["role"] == 1) {?>
                    <!-- <p class="mb-4">Crear Exámen<a target="_blank"
                            href="register_exam3.php"></a>.</p> -->
                            <a class="btn btn-success btn-sm" href="CreateExam.php?step=1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link me-1">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                </path><polyline points="15 3 21 3 21 9"></polyline>
                                <line x1="10" y1="14" x2="21" y2="3"></line>
                            </svg>Crear examen</a>
                            <?php }?>
                            <hr>
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
                                        <th style="width:180px;">Nombre</th>
                                        <th style="width:180px;">Tipo de Exámen</th>
                                        <th style="width:120px;">Estado</th>
                                        <th style="width:120px;">Fecha</th>
                                        <?php if($_SESSION["user"]["role"] == 1) {?>
                                        <th style="width:120px;">Acciones</th> <?php }?>
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
                                       

                                    <?php foreach(TestController::search() as $r) : ?>
                                        <tr>
                                            <td><?php echo $r->detail_test; ?></td>
                                            <td><?php echo $r->type_test; ?></td>
                                            <td><?php echo $r->detail; ?></td>
                                            <td><?php echo (date("d/m/Y H:i", strtotime($r->crate_at))); ?></td>
                                            <?php if($_SESSION["user"]["role"] == 1) {?>
                                            <td>
                                                <a href="Edit_Exam.php?id=<?php echo $r->id_test; ?>">Editar</a>
                                                <br>
                                                <a href="edit_person.php?dni_number=<?php echo $r->dni_number; ?>">Eliminar</a>
                                            </td>
                                            <?php }?>
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
