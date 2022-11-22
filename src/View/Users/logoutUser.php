<?php
    session_start();

    session_destroy();
    
    # Lo redireccionamos al formulario
    //header("Location: ./index.php");
    echo "<script> window.location='../LoginDocumento/loginDocumento.php'; </script>";

?>