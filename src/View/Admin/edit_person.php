<?php 

include '../../View/Admin/header.php';
include '../../Controller/Person.php';
include '../../Controller/Admin.php';
include '../../Controller/Status.php';
require_once '../../Controller/Type_test.php';

if(isset($_REQUEST['dni_number'])){
    $dni = $_REQUEST['dni_number'];
    $pvd = PersonController::Crud($dni);
    
}
if(isset($_POST['dni_number'])){
     PersonController::Editar($_POST);
      echo "<script>location.href='edit_person.php?dni_number=".$_REQUEST['dni_number']."';</script>";
}
?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1><strong>Editar Persona: </strong></h1>

    <!-- <h1 class="page-header">
    <?php echo $pvd->dni_number != null ? $pvd->surname : 'Datos de la Persona'; ?>
    </h1> -->

    <ol class="breadcrumb">
  <li class="active"><?php echo $pvd->dni_number != null ? $pvd->name ." ".$pvd->surname : 'Editar Fecha'; ?></li>
</ol>
<form id="frm-persona" action="?dni_number=<?php echo $_REQUEST['dni_number']?>" method="post" enctype="multipart/form-data">

    <input type="hidden" name="dni_number" value="<?php echo $pvd->dni_number; ?>" />
    
    <div>
        <label>Nombre</label>
        <input type="text" name="name" value="<?php echo $pvd->name; ?>" class="form-control" placeholder="Ingrese Nombre de la persona" data-validacion-tipo="requerido|min:100" />
    </div>

   <div >
        <label>Apellido</label>
        <input type="text" name="surname" value="<?php echo $pvd->surname; ?>" class="form-control" placeholder="Ingrese Apellido de la persona" data-validacion-tipo="requerido|min:100" />
    </div>


    <!-- <div>
        <label>Tipo de Examen</label>

    <br>

        <select name="type_test" class="form-select styled-select" aria-label="Default select example">
        
        
        <?php 
        foreach(Type_testController::search() as $r) :
        $selected = ($pvd->id_type_test == $r->id_type_test) ? "selected": '';
        ?>
        <option 
            value='<?php echo $r->id_type_test;?>' 
            <?php echo $selected;?> 
        >
            <?php echo $r->type_test;?>
        </option>
        <?php endforeach; ?>
        </select>
    </div> -->

    <div>
        <label>Habilitción</label>

    <br>

        <select name="detail" class="form-select styled-select" aria-label="Default select example">
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

    <div>
    <br>
        
    </div>

    <hr/>

    <div class="buttons">
        <button class="btn btn-outline-primary px-4" type="submit">Actualizar</button>
    </div>

</form>

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