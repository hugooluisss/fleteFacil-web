<?php
/**
* TPunto
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TPunto{
	private $idPunto;
	private $idOrden;
	private $direccion;
	private $json;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPunto($id = ''){
		$this->posicion = 0;
		$this->setId($id);
		
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "select * from punto where idPunto = ".$id;
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		foreach($rs->fetch_assoc() as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	/**
	* Retorna el id
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getId(){
		return $this->idPunto;
	}
	
	/**
	* Establece la orden
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setOrden($val = ''){
		$this->idOrden = $val;
		return true;
	}
	
	/**
	* Retorna la orden
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getOrden(){
		return $this->idOrden;
	}
	
	/**
	* Establece la direccion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDireccion($val = ''){
		$this->direccion = $val;
		return true;
	}
	
	/**
	* Retorna la direccion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDireccion(){
		return $this->direccion;
	}
	
	/**
	* Establece el objeto json de la ubicacion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setJSON($val = ''){
		$this->json = $val;
		return true;
	}
	
	/**
	* Retorna la posición en json
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getJSON(){
		return $this->json;
	}
	
	/**
	* Establece la posición
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPosicion($val = 0){
		$this->posicion = $val;
		return true;
	}
	
	/**
	* Retorna la posición
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPosicion(){
		return $this->posicion;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getOrden() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO punto(idOrden) VALUES('".$this->getOrden()."');";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
			
			$this->idPunto = $db->insert_id;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE punto
			SET
				direccion = '".$this->getDireccion()."',
				json = '".$this->getJSON()."',
				posicion = '".$this->getPosicion()."'
			WHERE idPunto = ".$this->getId();
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "delete from punto where idPunto = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>