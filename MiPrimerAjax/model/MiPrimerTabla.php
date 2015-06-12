<?php 
	
	class MiPrimerTabla
	{

		private $_db;
		private $_Cedula;
		private $_Nombre;
		private $_Telefono;
		private $_Direccion;

		public function __GET($atributo){
			return $this->$atributo;
		}

		public function __SET($atributo, $valor){
			$this->$atributo = $valor;
		}

		function __construct()
		{
			$this->_db = new Database();
		}

		public function Guardar(){

			if($this->_db->connection()){

				$sql = sprintf("INSERT INTO miprimertabla VALUES ('%s','%s','%s','%s')",
								mysqli_real_escape_string($this->_db->conection, $this->__GET("_Cedula")),
								mysqli_real_escape_string($this->_db->conection, $this->__GET("_Nombre")),
								mysqli_real_escape_string($this->_db->conection, $this->__GET("_Telefono")),
								mysqli_real_escape_string($this->_db->conection, $this->__GET("_Direccion")));
				if($this->_db->exec($sql)){
					return true;
				}else{
					return false;
				}

			}
		}

		public function Listar(){

			if($this->_db->connection()){

				$sql = "SELECT Cedula as c, Nombre, Telefono, Direccion FROM miprimertabla";

				$this->_db->query($sql);

				$arreglo = array();

				while($resultado = $this->_db->fetch_assoc()){
					$arreglo[] = array(
						'cedula'=>$resultado['c'],
						'nombre'=>$resultado['Nombre'],
						'telefono'=>$resultado['Telefono'],
						'direccion'=>$resultado['Direccion']
					);
				}
				return $arreglo;
			}
		}


	}

?>