<?php 
session_start();
include '../../View/header.php';
include '../../Controller/Test.php';
include '../../Controller/Person.php';
if($_POST){
    unset($_SESSION["user"]["examen"]["questions"][0]);
    $_SESSION["user"]["examen"]["questions"] = array_values($_SESSION["user"]["examen"]["questions"]);
    if($_SESSION["check"] == $_POST["countQuestionRadio"]){
        $_SESSION["user"]["examen"]["puntaje"] = $_SESSION["user"]["examen"]["puntaje"] +10;
    }
}
$dni = $_GET['dni'];
$person = PersonController::Crud($dni);
if(!isset($_SESSION["user"]["examen"]["questions"])){
$exam = TestController::searchByTest($person->test,$dni);
foreach($exam as $question){
    $_SESSION["user"]["examen"]["questions"][] = array("id_question"=>$question->id_question);
}
}
if(count($_SESSION["user"]["examen"]["questions"]) > 0){
$id_question =  $_SESSION["user"]["examen"]["questions"][0]["id_question"];
$question = TestController::searchQuestionById($person->test,$id_question,$dni);
foreach($question as $q){
    if($q->id_right == 1){
        $_SESSION["check"] = $q->id_option;
    }
}
}else{
    echo "<script> window.location='result.php'; </script>";
}
?>
<body>
    <div class="container prof">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                <form method="POST" action="test.php?dni=<?php echo $dni ?>"> 
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Exámen: <?php echo $person->type_test; ?> de <?php echo $person->name; ?> <?php echo $person->surname; ?></h6>
                    </div>
                    <div class="card-body">
                        <div>
                            <?php ?>
                            <!-- Save changes button-->
                            <h5 for="inputUsername"><?php echo $question[0]->question; ?></h5>
                            <br>
                            <?php
                            if(rand(0,1)==0){
                            $array = array_reverse($question);
                            }else {
                                $array = $question;
                            }
                            foreach($array as $r) : ?>
                            <input  type="radio" class="form-check-label"
                                name="countQuestionRadio" value="<?php echo $r->id_option?>"><?php echo $r->opcion ?></input>
                                <?php 
                                // echo "<pre>";
                                //  var_dump( $question);
                                //  echo "</pre>";
                                //         die();
                                ?>
                            <br>
                            <br>
                            <?php endforeach ?>
                        </div>
                        <div>
                        <div class="button">
                            <button class="btn btn-success float-right" type="submit">Siguiente</button>
                            <br>
                        </div>
                        </div>
                    </div>   
                </form>                     
                </div>
            </div>
        </div>
    </div>
</body>

<?php
  require_once '../../View/footer.php';
?>