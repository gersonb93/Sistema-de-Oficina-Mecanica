<?php
require_once "conexao.php";
require_once "PojoServico.php";

class FuncionarioDao {

    public static $instance;

    public function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoUsuario();

        return self::$instance;
    }

    public function Inserir(PojoFuncionario $funcionario) {
        try {
            $sql = "INSERT INTO func (		
                name_func,
                sexo,
                password) 
                VALUES (
                :name_func,
                :sexo,
                :password)";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":name_func", $funcionario->getName_func());
            $p_sql->bindValue(":sexo", $funcionario->getSexo());
            $p_sql->bindValue(":password", $funcionario->getPassword());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . 
$e->getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function BuscarFunc() {
        try {
            $sql = "SELECT * FROM func";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $linha = $p_sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    
private function populaFuncionario($row) {
        $pojo = new PojoFuncionario;
        $pojo->setId($row['id']);
        $pojo->setName_func($row['name_func']);
        $pojo->setPassword($row['password']);
        $pojo->setSexo($row['sexo']);
        return $pojo;
    }
	
	

}

?>