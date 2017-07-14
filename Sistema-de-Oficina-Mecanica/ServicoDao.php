<?php
require_once "conexao.php";
require_once "PojoServico.php";

class ServicoDao {

    public static $instance;

    public function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoUsuario();

        return self::$instance;
    }

    public function Inserir(PojoServico $servico) {
        try {
            $sql = "INSERT INTO servico (		
                dt_serv,
                tipo_serv,
                obs,
                vl_serv,
                name_cli,
				name_atendente,
				status) 
                VALUES (
                :dt_serv,
                :tipo_serv,
                :obs,
                :vl_serv,
                :name_cli,
				:name_atendente,
				:status)";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":dt_serv", $servico->getDt_serv());
            $p_sql->bindValue(":tipo_serv", $servico->getTipo_serv());
            $p_sql->bindValue(":obs", $servico->getObs());
            $p_sql->bindValue(":vl_serv", $servico->getVl_serv());
            $p_sql->bindValue(":name_cli", $servico->getName_cli());
			$p_sql->bindValue(":name_atendente", $servico->getName_atendente());
			$p_sql->bindValue(":status", $servico->getStatus());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . 
$e->getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function Editar(PojoServico $servico) {
        try {
            $sql = "UPDATE servico set
		dt_serv = :dt_serv,
                tipo_serv = :tipo_serv,
                obs = :obs,
                vl_serv = :vl_serv,
                name_cli = :name_cli,
				name_atendente = :name_atendente,
				status = :status WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":dt_serv", $servico->getDt_serv());
            $p_sql->bindValue(":tipo_serv", $servico->getTipo_serv());
            $p_sql->bindValue(":obs", $servico->getObs());
            $p_sql->bindValue(":vl_serv", $servico->getVl_serv());
            $p_sql->bindValue(":name_cli", $servico->getName_cli());
            $p_sql->bindValue(":name_atendente", $servico->getName_atendente());
			$p_sql->bindValue(":status", $servico->getStatus());
            $p_sql->bindValue(":id", $servico->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function Deletar($id) {
        try {
            $sql = "DELETE FROM servico WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function BuscarPorCOD($id) {
        try {
            $sql = "SELECT id, name_cli,DATE_FORMAT(dt_serv,'%d/%m/%Y') AS niceDate, tipo_serv, obs, vl_serv, name_atendente, status FROM servico WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->populaServico($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
    }
private function populaServico($row) {
        $pojo = new PojoServico;
        $pojo->setId($row['id']);
        $pojo->setDt_serv($row['niceDate']);
        $pojo->setTipo_serv($row['tipo_serv']);
        $pojo->setObs($row['obs']);
        $pojo->setVl_serv($row['vl_serv']);
        $pojo->setName_cli($row['name_cli']);
		$pojo->setName_atendente($row['name_atendente']);
		$pojo->setStatus($row['status']);
        return $pojo;
    }
	
	   public function ConsultaServicos() {
        try {
            $sql = "SELECT id, name_cli,DATE_FORMAT(dt_serv,'%d/%m/%Y') AS niceDate, tipo_serv, obs, vl_serv, name_atendente, status from servico";
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
	
	public function EditarStatus($status, $id) {
        try {
            $sql = "UPDATE servico set status = :status WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);
			$p_sql->bindValue(":status", $status);
            $p_sql->bindValue(":id", $id);

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
    }

}

?>