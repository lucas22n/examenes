<?php
    session_start();
  
    if(!isset($_SESSION["user"]))
    { 
        echo "<script> window.location='logout.php'; </script>";
    }
    if($_SESSION["user"]["role"] !== '1'|| $_SESSION["user"]["role"] !== '2'){
    }else {
        echo "<script> window.location='logout.php'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Receptionist Menu</title>

    <!-- Custom fonts for this template-->
    <link href="../../Assets/Admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Custom styles for this template-->
    <link href="../../Assets/Admin/css/sb-admin-2.css" rel="stylesheet">
   
    <!-- Custom styles for this page -->
    <link href="../../Assets/Admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script>
function setQuestion(id_category) {
  if (id_category == "") {
   // var selectQuestion= document.getElementsByName("question")[0];
   // for (var i=0; i<selectQuestion.length; i++) {
    //        selectQuestion.remove(i);
//}
  } else {
    var selectQuestion= document.getElementsByName("question")[0];
    for (var i=0; i<selectQuestion.length; i++) {
            selectQuestion.remove(i);
}
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        mostrar= JSON.parse(this.response);
        var selectQuestion= document.getElementsByName("question")[0];
        
        mostrar.questions.map( obj => {
        var option = document.createElement("option");
        console.log(obj)
        option.text = obj.question;
        selectQuestion.add(option);
            
        })

        //document.getElementById("txtHint").innerHTML = this.responseT   ;
      }
    };
    xmlhttp.open("GET","validation_test.php?type_test="+id_category,true);
    xmlhttp.send();
  }
}
</script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <img src="https://img.icons8.com/external-smashingstocks-glyph-smashing-stocks/66/FFFFFF/external-Test-education-smashingstocks-glyph-smashing-stocks.png"/>
                </div>
                <div class="sidebar-brand-text mx-3">Exámenes</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                <img src="https://img.icons8.com/sf-black/30/FFFFFF/menu.png"/>
                    <span>Panel principal</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Agregar menus -->

            <li class="nav-item active">
                <a class="nav-link" href="Examenes.php">
                    <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/survey--v1.png"/>
                    <span >Exámenes</span></a>
                <!-- <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="CreateExam.php?step=1">Crear</a>
                        <a class="collapse-item" href="update_test.php">Actualizar</a>
                        <a class="collapse-item" href="remove_test.php">Eliminar</a>
                    </div>
                </div> -->
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Agregar menus -->

            <li class="nav-item active">
                <a class="nav-link" href="AsignarExamenes.php">
                    <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/checklist--v1.png"/>
                    <span >Asignar Exámenes</span></a>
                <!-- <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="CreateExam.php?step=1">Crear</a>
                        <a class="collapse-item" href="update_test.php">Actualizar</a>
                        <a class="collapse-item" href="remove_test.php">Eliminar</a>
                    </div>
                </div> -->
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item -Buscar Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="BuscarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-Buscar fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="BuscarDropdown">
                                <form class="form-inline mr-auto w-100 navbar-Buscar">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Buscar for..." aria-label="Buscar"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-Buscar fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["var_id"][1]; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../../Assets/Admin/img/user.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mi Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- <script src="main.js"></script> -->
                <!-- End of Topbar -->