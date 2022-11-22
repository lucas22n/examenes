<?php 
include '../../View/Admin/header.php';
include '../../Controller/Person.php';
include '../../Controller/Test.php';
include '../../Controller/Test_question.php';
require_once '../../Controller/Question.php';
require_once '../../Controller/Option.php';
require_once '../../Controller/Category.php';
include '../../Controller/Admin.php';

if($_GET['step']==1){

?>
<div class="container-fluid">
    <form id="register_exam" action="register_exam.php" method="POST">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Crear exámen - Paso 1/3</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <!--<form class="user" id="form_step_1">-->
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="exampleFormControlSelect1">Nombre del exámen:</label>
                                    <input type="text" name="name" class="form-control" id="examName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="exampleFormControlSelect1">Categoría:</label>
                                    <select method="post" name="category" class="form-control" id="examCategory"
                                        onchange=setQuestion(this.value)>
                                        <?php foreach(CategoryController::searchCategory() as $r) :?>
                                        <option value=<?php echo $r->id_category;?>><?php echo $r->type_category; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="exampleFormControlSelect1">Tipo de exámen:</label>
                                    <select method="post" name="test" class="form-control" id="examCategory"
                                        onchange=setQuestion(this.value)>
                                        <?php foreach(CategoryController::searchType_test() as $r) :?>
                                        <option value=<?php echo $r->id_type_test;?>><?php echo $r->type_test; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block col-sm-1" type="submit">
                                Continuar
                            </button>
                            <!--</form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<?php 
}
if($_GET['step']==2){

    if(isset($_POST['id_test'])){
        
         //echo "<script>location.href='CreateExam.php?step=2".$_REQUEST['id_test']."';</script>";
   }
?>
<div class="container-fluid">
    <form id="register_exam2" action="register_exam2.php" method="POST">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Crear exámen - Paso 2/3</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" id="form_step_2">
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Seleccione su examen:</label>
                                        <select name="id_test" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm"
                                            id="questions">
                                            <?php foreach(TestController::search() as $r) :?>
                                            <option value=<?php echo $r->id_test;?>><?php echo $r->detail_test; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="sbp-preview-content">
                                        <label for="exampleFormControlSelect1">Cantidad de preguntas:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="flexRadioDefault1" type="radio"
                                                name="countQuestionRadio" value="10">
                                            <label class="form-check-label" for="flexRadioDefault1">10 preguntas</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="flexRadioDefault2" type="radio"
                                                name="countQuestionRadio" value="15" checked="">
                                            <label class="form-check-label" for="flexRadioDefault2">15 preguntas</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 mb-3 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Seleccione las preguntas:</label>
                                        <select name="id_question[]" class="form-control" size="20" id="questions"
                                            multiple="">
                                            <?php foreach(QuestionController::searchByCategory(1) as $r) :?>
                                            <option value=<?php echo $r->id_question;?>><?php echo $r->question; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <a href="CreateExam.php?step=1" class="btn btn-danger btn-user btn-block col-sm-1">
                                    Volver
                                </a>
                                <button class="btn btn-primary btn-user btn-block col-sm-2" type="submit">
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

<?php    
}
if($_GET['step']==3){
?>
<div class="container-fluid">
    <form id="register_exam3" action="register_exam3.php" method="POST">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Crear exámen - Paso 3/3</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" id="form_step_3">
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Seleccione su examen:</label>
                                        <select name="id_test" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm"
                                            id="questions">
                                            <?php foreach(TestController::search() as $r) :?>
                                            <option value=<?php echo $r->id_test;?>><?php echo $r->detail_test; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="sbp-preview-content">
                                        <label for="exampleFormControlSelect1">Selecciona cantidad de preguntas
                                            eliminatoria:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="flexRadioDefault1" type="radio"
                                                name="flexRadioDefault">
                                            <label class="form-check-label" for="flexRadioDefault1">Ninguna</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="flexRadioDefault2" type="radio"
                                                name="flexRadioDefault" checked="">
                                            <label class="form-check-label" for="flexRadioDefault2">1 pregunta</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 mb-3 mb-sm-0">
                                        <label for="exampleFormControlSelect1">Seleccione las preguntas:</label>
                                        <select name="elminate" id="exampleFormControlSelect2">
                                            <?php foreach(QuestionController::searchByCategory(1) as $r) :?>
                                            <option value=<?php echo $r->id_question;?>><?php echo $r->question; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <a href="CreateExam.php?step=2" class="btn btn-danger btn-user btn-block col-sm-1">
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


<?php    
}    
include '../../View/Admin/footer.php'

?>