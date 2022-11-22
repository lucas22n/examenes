<?php
require_once '../../Entity/conexion.php';
require '../../Entity/Test.php';

class TestDao extends Database
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
	public static function searchById($data)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			self::getDatabase();
			$query = "SELECT 
			id_test, 
			id_category,
			type_test,
			detail_test,
			Status.id_status,
			detail,
			crate_at
			FROM `Tests`
			JOIN `Type_Test` on Tests.id_type_test = Type_Test.id_type_test
			JOIN Status on Tests.status = Status.id_status
			WHERE Tests.id_test = :id";
			$resultado = self::$cnx->prepare($query);
			$resultado->bindParam(":id",$data->getId_test());
			$resultado->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $resultado->fetch(PDO::FETCH_OBJ);
	
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
    public static function search()
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			self::getDatabase();
			$query = "SELECT 
			id_test, 
			id_category,
			type_test,
			detail_test,
			detail,
			crate_at
			FROM `Tests`
			JOIN `Type_Test` on Tests.id_type_test = Type_Test.id_type_test
			JOIN Status on Tests.status = Status.id_status";
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



	public static function Create($test)
	{	
		$query = "INSERT INTO Tests (id_category,id_type_test, detail_test, status) 
		VALUES (:id_category,:id_type_test, :detail, :status)";
		

		self::getDatabase();

		$resultado = self::$cnx->prepare($query);
		

		$resultado->bindParam(":id_category", $test->getId_category());
		$resultado->bindParam(":id_type_test", $test->getId_type_test());
		$resultado->bindParam(":detail", $test->getDetal());
		$resultado->bindParam(":status",$test->getStatus());
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
			$query = "UPDATE Tests
					SET
					detail_test = :detail_test,
					status = :detail
				    WHERE Tests.id_test = :id_test";
			//Ejecución de la sentencia a partir de un arreglo.
			self::getDatabase();
			$resultado = self::$cnx->prepare($query);
			$resultado->bindParam(":id_test",$data->getId_test());
			$resultado->bindParam(":detail_test",$data->getDetail_test());
			$resultado->bindParam(":detail",$data->getStatus());
			if($resultado->execute()){
				echo'<script> window.location.href = "Examenes.php"; </script>';
			}
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public static function searchQuestionById($test, $person)
	{
		//print_r($test)
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el documento de la persona.
			self::getDatabase();
			$query = "SELECT
			Test_Questions.id_test_question,
            Test_Questions.id_test,
			Test_Questions.id_question,
			Questions.question,
			Options.opcion,
            Options.id_option,
			Options.id_right
			FROM `Test_Questions`
			JOIN Person on Test_Questions.id_test = Person.test
			JOIN Questions on Test_Questions.id_question = Questions.id_question
			JOIN Options on Questions.id_response = Options.id_question
			WHERE Test_Questions.id_test = :id_test AND Test_Questions.id_question = :id_question AND Person.dni_number = :dni_number";
			$resultado = self::$cnx->prepare($query);
			$resultado->bindParam(":id_test",$test->getId_test());
			$resultado->bindParam(":id_question",$test->getId_question());
			$resultado->bindParam(":dni_number",$person->getDni_number());
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

	public static function searchByTest($test, $person)
	{
		//print_r($test)
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el documento de la persona.
			self::getDatabase();
			$query = "SELECT
			Test_Questions.id_test_question,
            Test_Questions.id_test,
			Test_Questions.id_question,
			Questions.question,
			Questions.eliminate
			FROM `Test_Questions`
			JOIN Person on Test_Questions.id_test = Person.test
			JOIN Questions on Test_Questions.id_question = Questions.id_question
			WHERE Test_Questions.id_test = :test AND Person.dni_number = :dni_number";
			$resultado = self::$cnx->prepare($query);
			$resultado->bindParam(":test",$test->getId_test());
			$resultado->bindParam(":dni_number",$person->getDni_number());
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

	
	public static function findBySelectedTypeTest($selectedTypeTest)
	{
		//print_r($test)
		try
		{
			//Busqueda de los examenes habilitados segun el tipo de examen seleccionado por la persona
			self::getDatabase();
			$query = "SELECT
			Tests.*
			FROM `Tests`
			WHERE Tests.id_type_test = :selectedTypeTest and Tests.status = 2";
			$resultado = self::$cnx->prepare($query);
			$resultado->bindParam(":selectedTypeTest",$selectedTypeTest);
			//Ejecución de la sentencia SQL.
			$resultado->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			$devolver = $resultado->fetchAll(PDO::FETCH_OBJ);
			return $devolver;
	
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}

	public static function GuardarExamenAsignado($id_test_person, $id_test, $id_person)
	{	

		if($id_test_person != null) {
			try
			{
				//Sentencia SQL para actualizar los datos.
				$query = "UPDATE Test_Person
						SET
						id_test = :id_test,
						id_person = :id_person
						WHERE Test_Person.id_test_person = :id_test_person";
				//Ejecución de la sentencia a partir de un arreglo.
				self::getDatabase();
				$resultado = self::$cnx->prepare($query);
				$resultado->bindParam(":id_test_person", $id_test_person);
				$resultado->bindParam(":id_test", $id_test);
				$resultado->bindParam(":id_person", $id_person);
				if($resultado->execute()){
					echo'<script> window.location.href = "AsignarExamenes.php"; </script>';
				}
			} catch (Exception $e)
			{
				die($e->getMessage());
			}
		} else {
			try
			{
				//Sentencia SQL para actualizar los datos.
				$query = "Insert into Test_Person (id_test, id_person)
						values (:id_test, :id_person)";
				//Ejecución de la sentencia a partir de un arreglo.
				self::getDatabase();
				$resultado = self::$cnx->prepare($query);
				$resultado->bindParam(":id_test", $id_test);
				$resultado->bindParam(":id_person", $id_person);
				if($resultado->execute()){
					echo'<script> window.location.href = "AsignarExamenes.php"; </script>';
				}
			} catch (Exception $e)
			{
				die($e->getMessage());
			}
		}
	}
}