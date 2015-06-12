<?php 

class Database
{
	public $conection;	 //Object, contiene el objeto conexión
	public $result;	 //Recorset, contiene un array asociativo

	public function connection(){
		if($this->conection = mysqli_connect(DB_HOST, DB_USER, DB_PASS)){
			mysqli_select_db($this->conection, DB_NAME);
			mysqli_set_charset($this->conection, "utf8");
			return true;
		}else {
			return false;
		}
	}

	/**
	* Sirve para ejecutar las clausulas INSERT, UPDATE, DELETE en la base de datos
	* 
	* @param $query contiene la consulta que sera ejecutada
	*/
	public function exec($query){
		return $this->conection->query($query);
	}

	/**
	* Sirve para ejecutar la clausula SELECT en la base de datos
	* 
	* @param $query contiene la consulta que sera ejecutada
	*/
	public function query($query){
		return $this->result = $this->conection->query($query); 
	}

	/**
	* Sirve para averiguar el número de registros que trae la consulta
	* 
	* @param Dataset $this->result Contiene el resultado del dataset de la consulta
	*/
	public function num_rows(){
		return $this->result->num_rows;
	}
	/**
	* Sirve para recorrer el recorset o dataset generado por la consulta
	* 
	* @param Dataset $this->result Contiene el resultado del dataset de la consulta
	*/
	public function fetch_assoc(){
		return $this->result->fetch_assoc();
	}
	/**
	* Cuenta la cantidad de registros afectados en una consulta SQL
	* 
	* @param Dataset $this->result Contiene el resultado del dataset de la consulta
	*/
	public function affected_rows(){
		return mysqli_affected_rows($this->conection);
	}

    //Devuelve el último id del insert introducido
	public function last_id(){
		return mysqli_insert_id($this->conection);
	}

	//Libera el resultado para mejorar rendimiento y liberar memoria
	public function free_result(){
		return mysqli_free_result($this->result);
	}

	/**
	* Cierra la conexión de la base de datos
	* 
	* @param Object Conection $this->conection Contiene la conexión realizada en la base de datos
	*/
	public function close(){ 
		return $this->conection->close();
	}	
}

?>