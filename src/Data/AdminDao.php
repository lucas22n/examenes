<?php
 


include_once '../../Entity/conexion.php';
include '../../Entity/Admin.php';

class AdminDao extends Database
{

    protected static $cnx;

    private static function getDatabase()
    {
        self::$cnx = Database::Conectar();
    }

    private static function Desconectar()
    {
        self::$cnx = null;
    }

    public static function loginAdmin($user)
    {
        $query = "SELECT *
        FROM Users
        WHERE
        user = :user 
        AND 
        password = :password";

        self::getDatabase();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":user",$user->getUser());
        $resultado->bindParam(":password",$user->getPassword());
        //var_dump($resultado);

        $resultado->execute();

        if ($resultado->rowCount() > 0) 
        {  
                return true;
        }
        return false;
    }

       public function getAdmin($user)
    {
        $query = "SELECT
        id_user,
        user,
        id_rol
        FROM Users
        WHERE
        user = :user";

        self::getDatabase();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":user",$user->getUser());

        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);

    } 

    


}


?>