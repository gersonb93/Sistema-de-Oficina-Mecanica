<?php

class PojoFuncionario {
	
	private $id;
    private $name_func;
    private $sexo;
	private $password;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName_func() {
        return $this->name_func;
    }

    public function setName_func($name_func) {
        $this->name_func = $name_func;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }    

}

?>