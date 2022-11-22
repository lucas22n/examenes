<?php
require_once '../../Entity/conexion.php';
include '../../Entity/Person.php';

class PersonDao extends Database
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

    public static function login($person)
    {   $query = "SELECT dni_number
		FROM Person 
		WHERE dni_number = :dni_number";

        self::getDatabase();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":dni_number", $person->getDni_number());

        $resultado->execute();
        if ($resultado->rowCount() > 0) {  
				
                return true;
        }
        return false;
    }

    public static function Listar()
	{
		try
		{
            self::getDatabase();
			$result = array();
			//Sentencia SQL para selección de datos.
			$query = "SELECT 
			dni_number, 
			name, 
			surname, 
			gender, 
			date_time, 
			Type_Test.type_test, 
			detail,
			Person.id_test id_test
			FROM `Person` 
			JOIN Genders on Person.id_gender = Genders.id_gender
			JOIN Status on Person.id_status = Status.id_status
			JOIN Tests on Person.id_test = Tests.id_test 
			JOIN Type_Test on Tests.id_type_test = Type_Test.id_type_test
			WHERE DAY(date_time) = DAY(NOW())";

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

	public static function ListarPersonas()
	{
		try
		{
            self::getDatabase();
			$result = array();
			//Sentencia SQL para selección de datos.
			$query = "SELECT 
			dni_number, 
			name, 
			surname,
			date_time,
			Type_Test.type_test, 
			Person.id_test id_test,
			Person.id_person,
			Type_Test.type_test,
			Tests.detail_test,
			Test_Person.id_test id_examen_asignado,
			Test_Person.id_test_person id_test_person
			FROM `Person` 
			LEFT JOIN Genders on Person.id_gender = Genders.id_gender
			LEFT JOIN Status on Person.id_status = Status.id_status
			LEFT JOIN Type_Test on Person.id_test = Type_Test.id_type_test
			LEFT JOIN Test_Person on Person.id_person = Test_Person.id_person
			LEFT JOIN Tests on Test_Person.id_test = Tests.id_test
			where Person.id_status = 2 and (DATE(date_time) >= date(now()) and time(date_time) >= time(now()))";//Solo las personas que estan habilitadas tabla status

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


	public static function search($person)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el documento de la persona.
			self::getDatabase();
			$query = "SELECT
			name,
			surname,
			gender,
			date_time,
			Type_Test.id_type_test,
			type_test,
			email,
			phone,
			dni_number,
			type_dni,
			Status.id_status,
			detail,
			Person.test,
			Test_Questions.id_question,
			Questions.question,
			Questions.id_response,
			Options.opcion
			FROM `Person`
			JOIN Status on Person.id_status = Status.id_status
			JOIN Types_dni on Person.id_type_dni = Types_dni.id_type_dni 
			JOIN Genders on Person.id_gender = Genders.id_gender
			JOIN Tests on Person.id_test = Tests.id_test 
			JOIN Type_Test on Tests.id_type_test = Type_Test.id_type_test
			JOIN Test_Questions on Person.test = Test_Questions.id_test
			JOIN Questions on Test_Questions.id_question = Questions.id_question
			JOIN Options on Questions.id_response = Options.id_question
			WHERE Person.dni_number = :dni_number" ;
			$resultado = self::$cnx->prepare($query);
			$resultado->bindParam(":dni_number",$person->getDni_number());
			//Ejecución de la sentencia SQL.
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

	public static function searchByTest($dni)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el documento de la persona.
			self::getDatabase();
			$query = "SELECT
			Person.test,
            Options.id_question,
			Questions.question,
			Options.opcion,
            Options.id_option
			FROM `Person`
			JOIN Test_Questions on Person.test = Test_Questions.id_test
			JOIN Questions on Test_Questions.id_question = Questions.id_question
			JOIN Options on Questions.id_response = Options.id_question
			WHERE Person.dni_number = :dni_number";
			$resultado = self::$cnx->prepare($query);
			$resultado->bindParam(":dni_number",$dni->getDni_number());
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

	// //Método que actualiza una tupla a partir de la clausula
	// //Where y el Documento del persona.
	public static function Update($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$query = "UPDATE Person 
					SET
					surname = :surname,
					name = :name,
					id_status= :detail
				    WHERE dni_number = :dni_number";
			//Ejecución de la sentencia a partir de un arreglo.
			$resultado = self::$cnx->prepare($query);
			$resultado->bindParam(":surname",$data->getSurname());
			$resultado->bindParam(":name",$data->getName());
			// $resultado->bindParam(":type_test",$data->getType_test());
			$resultado->bindParam(":detail",$data->getId_status());
			// $resultado->bindParam(":date_time",$data->getDate_time());
			$resultado->bindParam(":dni_number",$data->getDni_number());
			$resultado->execute();
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	// //Este método obtiene los datos de la persona a partir del documento
	// //utilizando SQL.
	// public function Obtener($Documento)
	// {
	// 	try
	// 	{
	// 		//Sentencia SQL para selección de datos utilizando
	// 		//la clausula Where para especificar el documento de la persona.
	// 		$stm = $this->pdo->prepare("SELECT name, surname, gender, date_time, type_test, detail FROM `Person` 
	// 		JOIN Genders on Person.id_gender = Genders.id_gender
	// 		JOIN Status on Person.id_status = Status.id_status
	// 		JOIN Test on Person.id_test = Test.id_test JOIN Type_Test on Test.id_type_test = Type_Test.id_type_test
	// 		WHERE Person.dni_number = 23564512");
	// 		//Ejecución de la sentencia SQL utilizando el parámetro documento.
	// 		$stm->execute(array($Documento));
	// 		return $stm->fetch(PDO::FETCH_OBJ);
	// 	} catch (Exception $e)
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }

	// //Este método elimina la tupla persona dado un Documento.
	// public function Eliminar($Documento)
	// {

	// 	try
	// 	{
	// 		//Sentencia SQL para eliminar una tupla utilizando
	// 		//la clausula Where.
	// 		$stm = $this->pdo
	// 		            ->prepare("DELETE FROM Persona WHERE Documento = ? and nombre = ? and apellido = ?");

	// 		$stm->execute(array($Documento, $nombre, $apellido));
	// 	} catch (Exception $e)
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }

	// //Método que actualiza una tupla a partir de la clausula
	// //Where y el Documento de la persona.
	// public function Actualizar($data)
	// {
	// 	try
	// 	{
	// 		//Sentencia SQL para actualizar los datos.
	// 		$sql = "UPDATE Persona SET
	// 					Apellido          = ?,
	// 					Nombre        = ?,
    //         			FEcha_Examen        = ?
	// 			    WHERE Documento = ?";
	// 		//Ejecución de la sentencia a partir de un arreglo.
	// 		$this->pdo->prepare($sql)
	// 		     ->execute(
	// 			    array(
    //                     $data->Apellido,
    //                     $data->Nombre,
    //                     $data->Mesa,
    //                     $data->Documento
	// 				)
	// 			);
	// 	} catch (Exception $e)
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }

	// //Método que registra una nueva persona a la tabla.
	// public function Registrar(persona $data)
	// {
	// 	try
	// 	{
	// 		//Sentencia SQL.
	// 		$sql = "INSERT INTO Persona (Documento,Apellido,Nombre,Mesa,Domicilio)
	// 	        VALUES (?, ?, ?, ?, ?)";

	// 		$this->pdo->prepare($sql)
	// 	     ->execute(
	// 			array(
    //                 $data->Documento,
    //                 $data->Apellido,
    //                 $data->Nombre,
    //                 $data->Mesa,
	// 				$data->Domicilio,
    //             )
	// 		);
	// 	} catch (Exception $e)
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }

}
