<?php
/**
* TChofer
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
include_once("clases/aplicacion/TUsuario.class.php");
class TChofer extends TUsuario{
	private $nit;
	private $celular;
	private $patentecamion;
	private $patenterampla;
	private $idTransportista;
	private $idSituacion;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TChofer($id = ''){
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
		$sql = "select * from chofer where idUsuario = ".$id;
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		foreach($rs->fetch_assoc() as $field => $val){
			$this->$field = $val;
		}
		
		parent::setId($id);
		
		return true;
	}
	
	/**
	* Establece transportista
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTransportista($val = ""){
		$this->idTransportista = $val;
		return true;
	}
	
	/**
	* Retorna transportista
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTransportista(){
		return $this->idTransportista;
	}
	
	/**
	* Establece el valor del nit
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNit($val = ""){
		$this->nit = $val;
		return true;
	}
	
	/**
	* Retorna nit
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNit(){
		return $this->nit;
	}
	
	/**
	* Establece el valor del celular
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCelular($val = ""){
		$this->celular = $val;
		return true;
	}
	
	/**
	* Retorna celular
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCelular(){
		return $this->celular;
	}
	
	/**
	* Establece el valor del patente del camion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPatenteCamion($val = ""){
		$this->patentecamion = $val;
		return true;
	}
	
	/**
	* Retorna patente camion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPatenteCamion(){
		return $this->patentecamion;
	}
	
	/**
	* Establece el valor del patenterampla
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPatenteRampla($val = ""){
		$this->patenterampla = $val;
		return true;
	}
	
	/**
	* Retorna nit
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPatenteRampla(){
		return $this->patenterampla;
	}
	
	/**
	* Establece la situación o estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setSituacion($val = 1){
		$this->idSituacion = $val;
		return true;
	}
	
	/**
	* Retorna nit
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getSituacion(){
		return $this->idSituacion == ''?1:$this->idSituacion;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		$db = TBase::conectaDB();
		$sql = "select * from chofer where idTransportista = ".$this->getTransportista()." and idUsuario = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		if ($this->getId() == '' or $rs->num_rows == 0){
			$sql = "insert into chofer(idUsuario, idTransportista, idSituacion) VALUES(".parent::getId().", ".$this->getTransportista().", 1);";
			
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
				
			$this->idUsuario = parent::getId();
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE chofer
			SET
				nit = '".$this->getNit()."',
				celular = '".$this->getCelular()."',
				patentecamion = '".$this->getPatenteCamion()."',
				patenterampla = '".$this->getPatenteRampla()."',
				idSituacion = ".$this->getSituacion()."
			WHERE idUsuario = ".$this->getId()." and idTransportista = ".$this->getTransportista();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
}
?>