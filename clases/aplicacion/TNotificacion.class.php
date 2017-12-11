<?php
/**
* TNotificacion
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TNotificacion{
	private $idNotificacion;
	private $mensaje;
	private $idOrden;
	private $fecha;
	private $leido;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TNotificacion($id = ''){
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
		$sql = "select * from notificacion a where idNotificacion = ".$id;
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
		return $this->idNotificacion;
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
	* Retorna el identificador de la orden
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getOrden(){
		return $this->idOrden;
	}
	
	/**
	* Establece el mensaje
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setMensaje($val = ''){
		$this->mensaje = $val;
		return true;
	}
	
	/**
	* Retorna el mensaje
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getMensaje(){
		return $this->mensaje;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar($receptor){
		if ($this->getOrden() == '') return false;
		$usuario = new TUsuario($receptor);
		switch($usuario->getPerfil()){
			case 1: case 2:
				$receptor = new TUsuario($receptor);
				
				if ($receptor->getId() == '') return false;
				
				$db = TBase::conectaDB();
				if ($this->getId() == ''){
					$sql = "INSERT INTO notificacion(idOrden, mensaje, fecha) VALUES(".$this->getOrden().", '".$this->getMensaje()."', now());";
					$rs = $db->query($sql) or errorMySQL($db, $sql);;
					if (!$rs) return false;
					
					$this->tipoemisor = $tipo;
					$this->idNotificacion = $db->insert_id;
				}else #no se puede modificar una notificacion
					return false;
				
				if ($this->getId() == '')
					return false;
				
				$sql = "insert into notificacionusuario (idNotificacion, idUsuario) values (".$this->getId().", ".$receptor->getId().")";
				
				$this->receptor = $receptor;
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				return $rs?true:false;
			break;
			case 3: case 4:
				$this->receptor = new TChofer($receptor);
				if ($this->receptor->isVisible() and $this->receptor->getSituacion() <> 3)
					return $this->enviar();
				else
					return true;
			break;
		}
	}
	
	/**
	* Envia notificación a dispositivos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function enviar(){
		//if ($this->getId() == '') return false;
		if ($this->getMensaje() == '') return false;
		if ($this->getOrden() == '') return false;
		
		global $ini;
			
		$pb = new PushBots();
		$pb->App($ini['pushbot']['aplication_id'], $ini['pushbot']['secret']);
		$pb->Alert($this->getMensaje());
		$pb->Platform(array("0","1"));
		$pb->Alias("usuario_".$this->receptor->getId());
		
		$pb->Push();
		
		/*if ($this->tipoemisor == 'T'){
			$pb->Tags("transportista_".$this->receptor->getId());
			$pb->Push();
		}else{
			$pb->Tags("usuario_".$this->receptor->getId());
		}
		*/
		return true;
	}
	
	/**
	* Set leido
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setLeido(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		$sql = "update notificacion set leido = 1 where idOrden = ".$this->getOrden();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return true;
	}
}
?>