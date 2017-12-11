<?php
/**
* TTransportista
* Transportistas que pueden realizar el trabajo
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TTransportista{
	private $idTransportista;
	private $nombre;
	private $representante;
	private $email;
	private $celular;
	private $visible;
	public $regiones;
	public $empresa;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TTransportista($id = ''){
		$this->regiones = array();
		$this->empresa = new TEmpresa;
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
		$rs = $db->query("select * from transportista where idTransportista = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idEmpresa':
					$this->empresa = new TEmpresa($val);
				break;
				default:
					$this->$field = $val;
			}
		}
		
		$this->getRegiones();
		
		return true;
	}
	
	/**
	* Carga las regiones
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRegiones(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "select idRegion, idEmpresa from transportistaregion where idTransportista = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$this->regiones = array();
		while($row = $rs->fetch_assoc()){
			$this->regiones[$row['idRegion']."-".$row['idEmpresa']] = array("region" => new TRegion($row['idRegion']), "empresa" => $row['idEmpresa']);
		}
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idTransportista;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece el nombre del representante
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRepresentante($val = ''){
		$this->representante = $val;
		return true;
	}
	
	/**
	* Retorna el nombre del representante
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRepresentante(){
		return $this->representante;
	}
	
	/**
	* Establece el email
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmail($val = ""){
		$this->email = $val;
		return true;
	}
	
	/**
	* Retorna el email
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmail(){
		return $this->email;
	}
	
	/**
	* Establece el celular
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCelular($val = ""){
		$this->celular = $val;
		return true;
	}
	
	/**
	* Retorna el celular
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCelular(){
		return $this->celular;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->empresa->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO transportista(idEmpresa, visible) VALUES(".$this->empresa->getId().", 1);";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
			
			$this->idTransportista = $db->insert_id;
			
			$sql = "INSERT INTO empresatransportista(idEmpresa, idTransportista) VALUES(".$this->empresa->getId().", ".$this->idTransportista.");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
		}

		if ($this->getId() == '')
			return false;
			
		$sql = "UPDATE transportista
			SET
				nombre = '".$this->getNombre()."',
				representante = '".$this->getRepresentante()."',
				email = '".$this->getEmail()."',
				celular = '".$this->getCelular()."',
				idEmpresa = ".$this->empresa->getId()."
			WHERE idTransportista = ".$this->getId();
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		if ($rs)
			$this->setId($this->getId());
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "update transportista set visible = false where idTransportista = ".$this->getId();
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
	
	/**
	* Guardar regiones
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardarRegiones(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "delete from transportistaregion where idTransportista = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		foreach($this->regiones as $region){
			$sql = "insert into transportistaregion (idTransportista, idRegion, idEmpresa) values (".$this->getId().", ".$region->getId().", ".$this->empresa->getId().")";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
		}
		
		return true;
	}
	
	/**
	* Retorna si el transportista está habilitado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function isVisible(){
		return $this->visible == 1;
	}
}
?>