<?php 
    session_start();
    include '../../View/header.php';
?>

<div class="container prof">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
        <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Resultado del Examen Teórico de Tránsito</h6>
                </div>
                <div class="card-body">
                    <h1 class="text-center"><strong>RESULTADO DE EXAMEN</strong></h1><br>
                    <h1 class="text-center"><strong> <?php echo $_SESSION["user"]["examen"]["puntaje"] ?> /100 </strong></h1>
                    <h4 class="mt-2 mb-0 fonts-result">En caso de estar aprobado puede dirigirse con el recepcionista para solicitar su turno de examen práctico de conducir, muchas gracias.</h4>
                    <!-- Salir -->
                <a href="logoutUser.php" class="btn btn-primary float-right">
                    <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Finalizar</span>
                    </a>
                </div>                        
            </div>
        </div>
    </div>
</div>

<?php
  require_once '../../View/footer.php';
?>