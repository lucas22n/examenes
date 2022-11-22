<?php 
   session_start();
    include '../../View/header.php';
    include '../../Controller/Person.php';
    $person_profile = PersonController::profile($_GET['dni']);
?>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                    <img src="../../Assets/img/data_person.png" width="80" class="rounded-circle" class="img-radius" alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600">HOLA!</h6>
                                    <p name="greeting_start"><?php echo $person_profile ->name; ?></p>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                   
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informacion Del Usuario</h6>
                                    <div class="row">
                                    <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Apellido y Nombre</p>
                                    <h6 name="fullname" class="text-muted f-w-400"><?php echo $person_profile->surname." ".$person_profile->name; ?></h6>
                                    <p class="m-b-10 f-w-600">Documento</p>
                                    <h6 name="doc" class="text-muted f-w-400"><?php echo $person_profile ->dni_number; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Género</p>
                                    <h6 name="gender" class="text-muted f-w-400"><?php echo $person_profile ->gender; ?></h6>
                                    <p class="m-b-10 f-w-600">Tipo Documento</p>
                                    <h6 name="typedoc" class="text-muted f-w-400"><?php echo $person_profile ->type_dni; ?></h6>
                                    
        
                                </div>

                                </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Contacto</h6>
                                    <div class="row">
                                    <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Email</p>
                                    <h6 name="email" class="text-muted f-w-400"><?php echo $person_profile ->email; ?></h6>
                                 </div>

                                 <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Celular</p>
                                    <h6 name="phone_number" class="text-muted f-w-400"><?php echo $person_profile ->phone; ?></h6>
                                </div>

                                </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Turno</h6>
                                        <div class="row">
                                        <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Categoría</p>
                                        <h6 name="category_type" class="text-muted f-w-400"><?php echo $person_profile ->type_test; ?></h6>
                                </div>

                                <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Fecha y Horario</p>
                                            <h6 name="datetime_shift" class="text-muted f-w-400"><?php echo (date("d/m/Y H:i", strtotime($person_profile ->date_time)));?></h6>
                                </div>
                                <br>
                                <br>
                                    
                                <div class="my-2"></div>
                                    <a href="conditions.php?dni=<?php echo $person_profile->dni_number; ?> " class="btn btn-secondary float-right">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Siguiente</span>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php
  require_once '../../View/footer.php';
?>