<?php 
include '../../View/Admin/header.php';


include '../../Controller/Person.php';
include '../../Controller/Admin.php';
include '../../Controller/Status.php';
include '../../Controller/Test.php';
require_once '../../Controller/Type_test.php';


//Validaciones de los datos de entrada requeridos
if(isset($_REQUEST['id_person'])){
    $id_person = $_REQUEST['id_person'];
}else{
    echo "Error al asignar el examen. Falta un dato requerido";
}

if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
}else{
    echo "Error al asignar el examen. Falta un dato requerido";
}

if(isset($_REQUEST['surname'])){
    $surname = $_REQUEST['surname'];
}else{
    echo "Error al asignar el examen. Falta un dato requerido";
}

if(isset($_REQUEST['dni_number'])){
    $dni_number = $_REQUEST['dni_number'];
} else{
    echo "Error al asignar el examen. Falta un dato requerido";
}

if(isset($_REQUEST['id_examen_seleccionado'])){
    $id_examen_seleccionado = $_REQUEST['id_examen_seleccionado'];
}else{
    echo "Error al asignar el examen. Falta un dato requerido";
}

if(isset($_REQUEST['id_examen_asignado'])){
    $id_examen_asignado = $_REQUEST['id_examen_asignado'];
}

if(isset($_REQUEST['id_test_person'])){
    $id_test_person = $_REQUEST['id_test_person'];
}

?>
<div class="container-fluid">
    <div class="card">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Editar Asignación De Exámen</h4>
            </div>
            <div class="card-body">
            <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" id="asignarExamen" action="registerAsignarExamen.php" method="POST">
                                <div hidden>
                                    <input type="text" value="<?php echo $id_test_person; ?>" name="id_test_person" class="form-control" id="id_test_person">
                                </div>
                                <div hidden>
                                    <input type="text" value="<?php echo $id_person; ?>" name="id_person" class="form-control" id="id_person">
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mb-1 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Datos de la persona:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mb-1 mb-sm-0">
                                        <label for="exampleFormControlSelect1">DNI: <?php echo $dni_number; ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Nombre: <?php echo $name; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Apellido: <?php echo $surname; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Seleccione examen:</label>
                                        <select id="id_test" name="id_test" class="form-control">
                                         <?php 
                                           foreach(TestController::findBySelectedTypeTest($id_examen_seleccionado) as $r) :
                                           $selected = ($id_examen_asignado == $r->id_test) ? "selected": '';
                                           ?>
                                           <option 
                                               value='<?php echo $r->id_test;?>' 
                                               <?php echo $selected;?> 
                                           >
                                               <?php echo $r->detail_test;?>
                                           </option>
                                           <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <a href="../Admin/AsignarExamenes.php" class="btn btn-danger btn-user btn-block col-sm-1">
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