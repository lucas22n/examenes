$(document).ready(function(){
    $('#loginForm').bind("submit",function(){
        
        $.ajax({
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            // beforeSend: function(){
            //     $("#loginForm input[type=submit]").html("Ingresando...");
            //     $("#loginForm input[type=submit]").attr("disabled","disabled");
            // },
            success:function(response){
                if(response.estado == true){
                    $("body").overhang({
                        type: "success",
                        message: "Documento encontrado, ya te estamos redirigiendo!",
                        callback:function(){
                            window.location.href = "/View/Users/information.php?dni="+response.dni;
                        }
                      });
                }else{
                    $("body").overhang({
                        type: "error",
                        message: "Documento no encontrado!"
                      });
                }
                // $("#loginForm input[type=submit]").html("Reintentar");
               
            },
            error:function(){
                $("body").overhang({
                    type: "error",
                    message: "Documento no encontrado!"
                  });
                //   $("#loginForm input[type=submit]").html("Reintentar");
            }
        });

        return false;
    });
    //end of changes
    $('#form_user').bind("submit",function(){
        
        $.ajax({
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            // beforeSend: function(){
            //     $("#submit_login").html("Ingresando...");
            //     $("#submit_login").attr("disabled","disabled");
            // },
            success:function(response){
                if(response.estado == true){
                    $("body").overhang({
                        type: "success",
                        message: "Usuario encontrado, ya te estamos redirigiendo!",
                        callback:function(){
                            window.location.href = "/View/Admin/index.php"
                        }
                      });
                }else{
                    $("body").overhang({
                        type: "error",
                        message: "Usuario o contraseña incorrecta!"
                      });
                }
                // $("#submit_login").html("Reintentar");
               
            },
            error:function(){
                $("body").overhang({
                    type: "error",
                    message: "Usuario o contraseña incorrecta!"
                  });
                //   $("#submit_login").html("Reintentar");
            }
        });

        return false;
    });
});