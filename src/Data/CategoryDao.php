<?php
require_once '../../Entity/conexion.php';
include '../../Entity/Category.php';

class CategoryDao extends Database
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

    public static function searchCategory()
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			self::getDatabase();
			$query = "SELECT
			id_category, 
      		type_category
      		FROM `Type_category`";
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
public static function searchType_test()
{
	try
	{
		//Sentencia SQL para selección de datos utilizando
		self::getDatabase();
		$query = "SELECT
		id_type_test, 
		  type_test
		  FROM `Type_Test`";
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
}