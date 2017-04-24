<?php
/**
* TOrden
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TOrden{
	private $idOrden;
	public $estado;
	public $usuario;
	private $descripcion;
	private $requisitos;
	private $fechaservicio;
	private $plazo;
	private $peso;
	private $volumen;
	private $origen;
	private $destino;
	private $presupuesto;
	private $propuestas;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TOrden($id = ''){
		$this->estado = new TEstado(1);
		$this->usuario = new TUsuario();
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
		$sql = "select * from orden where idOrden = ".$id;
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idUsuario':
					$this->usuario = new TUsuario($val);
				break;
				case 'idEstado':
					$this->estado = new TEstado($val);
				break;
				default:
					$this->$field = $val;
				break;
			}
		}
		
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
		return $this->idOrden;
	}
	
	/**
	* Establece la descripcion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDescripcion($val = ''){
		$this->descripcion = $val;
		return true;
	}
	
	/**
	* Retorna la descripción
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece los requisitos
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRequisitos($val = ''){
		$this->requisitos = $val;
		return true;
	}
	
	/**
	* Retorna los requisitos
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRequisitos(){
		return $this->requisitos;
	}
	
	/**
	* Establece la fecha en la que se debe de realizar el servicio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFechaServicio($val = ''){
		$this->fechaservicio = $val;
		return true;
	}
	
	/**
	* Retorna la fecha en la que se debe de realizar el servicio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFechaServicio(){
		return $this->fechaservicio;
	}
	
	/**
	* Establece el plazo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPlazo($val = ''){
		$this->plazo = $val;
		return true;
	}
	
	/**
	* Retorna el plazo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPlazo(){
		return $this->plazo;
	}
	
	/**
	* Establece el peso
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPeso($val = ''){
		$this->peso = $val;
		return true;
	}
	
	/**
	* Retorna los requisitos
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPeso(){
		return $this->peso;
	}
	
	/**
	* Establece el volumen a transportar
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setVolumen($val = ''){
		$this->volumen = $val;
		return true;
	}
	
	/**
	* Retorna los requisitos
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getVolumen(){
		return $this->volumen;
	}
	
	/**
	* Establece el valor en json del punto de origen
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setOrigen($val = ''){
		$this->origen = $val;
		return true;
	}
	
	/**
	* Retorna el punto de origen en formato json
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getOrigen(){
		return $this->origen;
	}
	
	/**
	* Establece el punto de destino en formato json
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDestino($val = ''){
		$this->destino = $val;
		return true;
	}
	
	/**
	* Retorna el punto de destino
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDestino(){
		return $this->destino;
	}
	
	/**
	* Establece el presupuesto
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPresupuesto($val = 0){
		$this->presupuesto = $val;
		return true;
	}
	
	/**
	* Retorna el presupuesto
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPresupuesto(){
		return $this->presupuesto == ''?0:$this->presupuesto;
	}
	
	/**
	* Establece el total de propuestas a recibir
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPropuestas($val = 0){
		$this->propuestas = $val;
		return true;
	}
	
	/**
	* Retorna el total de propuestas a recibir
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPropuestas(){
		return $this->propuestas == ''?3:$this->propuestas;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->usuario->getId() == '') return false;
		if ($this->estado->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO orden(idUsuario, idEstado) VALUES(".$this->usuario->getId().", ".$this->estado->getId().");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);;
			if (!$rs) return false;
			
			$this->idOrden = $db->insert_id;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE orden
			SET
				idUsuario = ".$this->usuario->getId().",
				idEstado = ".$this->estado->getId().",
				descripcion = '".$this->getDescripcion()."',
				requisitos = '".$this->getRequisitos()."',
				fechaservicio = '".$this->getFechaServicio()."',
				plazo = '".$this->getPlazo()."',
				peso = '".$this->getPeso()."',
				volumen = '".$this->getVolumen()."',
				origen = '".$this->getOrigen()."',
				destino = '".$this->getDestino()."',
				presupuesto = ".$this->getPresupuesto().",
				propuestas = ".$this->getPropuestas()."
			WHERE idorden = ".$this->getId();
			
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
		$sql = "delete from orden where idOrden = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>