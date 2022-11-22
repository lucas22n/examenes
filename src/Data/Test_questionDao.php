<?php
require_once '../../Entity/conexion.php';
include '../../Entity/Test_question.php';

class Test_questionDao extends Database
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
	
    public static function Create($test)
	{
        $query = "INSERT INTO Test_Questions (id_test,id_question,elminate) 
		VALUES (:id_test,:id_question,0)";
        // prepare a stamemnt only once
        self::getDatabase();
        $resultado = self::$cnx->prepare($query);
        
        $resultado->bindParam(":id_test", $test->getId_test());
        $resultado->bindParam(":id_question", $test->getId_question());
       
        // $id = $resultado->lastInsertId();
		// print_r($id) ;
       
        // iterate over your POST[question_name] array
       
            // print_r($test);
            if ($resultado->execute()){
                return true;
            }
    
            return false;
        
        }

        public static function Update($data)
        {
            try
            {
                //Sentencia SQL para actualizar los datos.
                $query = 
                "UPDATE Test_Questions 
                SET
                id_test = :id_test,
                elminate = 1
                WHERE id_question = :eliminate";
                //Ejecución de la sentencia a partir de un arreglo.
                self::getDatabase();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":id_test",$data->getId_test());
                $resultado->bindParam(":eliminate",$data->getId_question());
                if ($resultado->execute()){
                    return true;
                }
        
                return false;
            
            } catch (Exception $e)
            {
                die($e->getMessage());
            }
        }

}