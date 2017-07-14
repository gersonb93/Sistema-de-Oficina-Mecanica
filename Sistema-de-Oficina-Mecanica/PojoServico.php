<?php

class PojoServico {
	
	private $id;
    private $dt_serv;
    private $tipo_serv;
	private $obs;
	private $vl_serv;
	private $name_cli;
	private $name_atendente;
	private $status;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDt_serv() {
        return $this->dt_serv;
    }

    public function setDt_serv($dt_serv) {
        $this->dt_serv = $dt_serv;
    }

    public function getTipo_serv() {
        return $this->tipo_serv;
    }

    public function setTipo_serv($tipo_serv) {
        $this->tipo_serv = $tipo_serv;
    }

    public function getObs() {
        return $this->obs;
    }

    public function setObs($obs) {
        $this->obs = $obs;
    }    
    
    public function getVl_serv() {
        return $this->vl_serv;
    }

    public function setVl_serv($vl_serv) {
        $this->vl_serv = $vl_serv;
    }
    
    public function getName_cli() {
        return $this->name_cli;
    }

    public function setName_cli($name_cli) {
        $this->name_cli = $name_cli;
    }
	
	public function getName_atendente() {
        return $this->name_atendente;
    }

    public function setName_atendente($name_atendente) {
        $this->name_atendente = $name_atendente;
    }
	
	public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}

?>