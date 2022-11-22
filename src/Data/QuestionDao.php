<?php
require_once '../../Entity/conexion.php';
include '../../Entity/Question.php';

class QuestionDao extends Database
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
	
    public static function search()
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			self::getDatabase();
			$query = "SELECT DISTINCT
			question
			FROM `Questions`";
			$resultado = self::$cnx->prepare($query);
			//Ejecución de la sentencia SQL.
			$resultado->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $resultado->fetchAll(PDO::FETCH_OBJ);
	
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}

	public static function searchByCategory($question)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			self::getDatabase();
			$query = "SELECT DISTINCT
			id_question,
			question
			FROM `Questions`
			WHERE id_category = :id_category";
			$resultado = self::$cnx->prepare($query);
			$resultado->bindParam(":id_category", $question->getId_category());
			//Ejecución de la sentencia SQL.
			$resultado->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $resultado->fetchAll(PDO::FETCH_OBJ);
	
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}


    // public static function Listar()
	// {
	// 	try
	// 	{
    //         self::getDatabase();
	// 		$result = array();
	// 		//Sentencia SQL para selección de datos.
	// 		$query = "SELECT question 
    //         FROM `Questions`";

    //         $resultado = self::$cnx->prepare($query);
	// 		//Ejecución de la sentencia SQL.
	// 		$resultado->execute();
	// 		//fetchAll — Devuelve un array que contiene todas las filas del conjunto
	// 		//de resultados
            
    //         return $resultado->fetchAll(PDO::FETCH_OBJ);
	// 	}
	// 	catch(Exception $e)
	// 	{
	// 		//Obtener mensaje de error.
	// 		die($e->getMessage());
	// 	}
	// }


}