<?php
  include '../header.php';
?>

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container-xl px-6" style="margin-top:10%;">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <!-- Basic login form-->
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center"><h3 class="fw-light my-4">Bienvenido</h3></div>
                            <div class="card-body">
                                <!-- Login form-->
                                <form id="loginForm" autocomplete="off" action="/View/LoginDocumento/validation_document.php" name="document" method="POST">
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="dni">DNI</label>
                                        <input class="form-control" id="dni" name="dni" type="number">
                                    </div>
                                    <!-- Form Group (login box)-->
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">INGRESAR</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="../Users/user.php">Ingreso Usuario Restringido</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
    <!-- Footer -->
    <footer class="sticky-footer ">
        <div class="container my-auto">
        <div class="copyright text-center my-auto color-white">
             <span>Alumnos ISFT177 &copy; 2022.</span>
        </div>
        </div>
    </footer>
<!-- End of Footer --> 



<?php
  require_once '../footer.php';
?>