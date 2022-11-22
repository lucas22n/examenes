<?php 
include '../../View/Admin/header.php';


include '../../Controller/Person.php';
include '../../Controller/Admin.php';
include '../../Controller/Status.php';
include '../../Controller/Test.php';
require_once '../../Controller/Type_test.php';

if(isset($_REQUEST['id'])){
    $data = $_REQUEST['id'];
    $pvd = TestController::Crud($data);
    $id_test = $pvd->id_test;
    
}
if(isset($_POST['name'],$id_test)){
    TestController::Editar($_POST,$id_test);
    echo "<script>Edit_Exam.php?id=".$_REQUEST['id']."';</script>";
}
?>
<div class="container-fluid">
<form action="Edit_Exam.php?id=<?php echo $_REQUEST['id']?>" method="POST">
    <div class="card">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Editar Exámen</h4>
            </div>
            <div class="card-body">
            <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" id="form_step_3">
                            <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Nombre Nuevo:</label>
                                        <input type="text" value="<?php echo $pvd->detail_test; ?>" name="name" class="form-control" id="examName">
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Estado:</label>
                                        <select name="detail" class="form-control">
                                         <?php 
                                           foreach(StatusController::search() as $r) :
                                           $selected = ($pvd->id_status == $r->id_status) ? "selected": '';
                                           ?>
                                           <option 
                                               value='<?php echo $r->id_status;?>' 
                                               <?php echo $selected;?> 
                                           >
                                               <?php echo $r->detail;?>
                                           </option>
                                           <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <a href="../Admin/Examenes.php" class="btn btn-danger btn-user btn-block col-sm-1">
                                    Volver
                                </a>
                                <button class="btn btn-primary btn-user btn-block col-sm-1" type="submit">
                                    Continuar
                                </button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>  
    </div>
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
<script>
    $(document).ready(function(){
        $("#frm-persona").submit(function(){
            return $(this).validate();
        });
    })
</script>
<?php 
include '../../View/Admin/footer.php'


?>