<?php 
   session_start();
    include '../../View/header.php';
    include '../../Controller/Person.php';
    $person_profile = PersonController::profile($_GET['dni']);
   
    ?>
<div class="container prof">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Condiciones Del Examen de <?php echo $person_profile->name?></h6>
                </div>
                <div class="card-body">
                    <div>
                        <ul>
                            <li>El examen constará de un máximo de 25 preguntas</li>
                            <li>Las preguntas serán según la categoría elegida para su licencia, una de ellas puede o no ser eliminatoria. Si esta se responde mal, el usuario quedará desaprobado automáticamente.</li>
                            <li>Solo hay una respuesta correcta por pregunta.</li>
                            <li>La duración del mismo será de 30 minutos.</li>
                            <li>Al finalizar el examen se mostrará en pantalla el resultado. Si el resultado es aprobado, el usuario podrá dirigirse con el recepcionista y elegir un turno para realizar el examen práctico dentro de los 30 días corridos.</li>
                        <ul>
                    </div>
                     <div>
                        <!--<a class="btn btn-outline-primary px-4" href="test.php">INICIAR</a>!-->
                        <a href="test.php?dni=<?php echo $person_profile->dni_number; ?>" class="btn btn-success float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text" >Iniciar</span>
                        </a>
                    </div>
                </div>                        
            </div>
        </div>
    </div>
</div>

<?php
  require_once '../../View/footer.php';
?>