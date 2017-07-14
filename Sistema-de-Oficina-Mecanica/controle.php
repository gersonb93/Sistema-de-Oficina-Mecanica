<?php
session_start();
include("PojoServico.php");
include("ServicoDao.php");
include("FuncionarioDao.php");
include("PojoFuncionario.php");

class Controle{
    
   function cadastrar(){
	
	$dao = new ServicoDao;
	$servico = new PojoServico;
	$servico->setId($_POST['id']);$servico->setDt_serv($_POST['dt_serv']);$servico->setTipo_serv($_POST['tipo_serv']);
	$servico->setObs($_POST['obs']);$servico->setVl_serv($_POST['vl_serv']);$servico->setName_cli($_POST['name_cli']);
	$servico->setName_atendente($_POST['name_atendente']);$servico->setStatus($_POST['status']);
	$dao->Inserir($servico);
    header("Location: home.php");
    } 
	
	public function consultarInformacoes(){
		$dao = new ServicoDao;
		$servico = new PojoServico;
		$servico = $dao->BuscarPorCOD($_GET['id']);
		return $servico;
	 header("Location: alterar.php");
    } 
	
	function Alterar(){
   
     $dao = new ServicoDao;
	$servico = new PojoServico;
	$servico->setId($_POST['id']);$servico->setDt_serv($_POST['dt_serv']);$servico->setTipo_serv($_POST['tipo_serv']);
	$servico->setObs($_POST['obs']);$servico->setVl_serv($_POST['vl_serv']);$servico->setName_cli($_POST['name_cli']);
	$servico->setName_atendente($_POST['name_atendente']);$servico->setStatus($_POST['status']);
	$dao->Editar($servico);
	 header("Location: home.php");

    } 
    public function deletar(){
		$dao = new ServicoDao;
		$dao->Deletar($_POST['id']);
	 header("Location: home.php");
    }
     
		
	function mudarStatus(){
		
		$dao = new ServicoDao;
		$servico = new PojoServico;
		$servico = $dao->BuscarPorCOD($_POST['id']);
	
	if($servico->getStatus() == "Novo"){
	$dao->EditarStatus("Em Andamento", $servico->getId());
	header("Location: home.php");
	}else if($servico->getStatus() == "Em Andamento" ){
	$dao->EditarStatus("Finalizado", $servico->getId());
	header("Location: home.php");
	}else if($servico->getStatus() == "Finalizado" ){
	header("Location: home.php");
	 }else{
		 echo 'Erro';
	 }
} 



function forward($location, $vars = array()) 
{
    $file ='http://'.$_SERVER['HTTP_HOST']
    .substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'], '/')+1)
    .$location;

    if(!empty($vars))
    {
         $file .="?".http_build_query($vars);
    }

    $response = file_get_contents($file);

    echo $response;
}

function cadastrarFunc(){
	
	$dao = new FuncionarioDao;
	$funcionario = new PojoFuncionario;
	$funcionario->setId($_POST['id']);$funcionario->setName_func($_POST['name_func']);$funcionario->setSexo($_POST['sexo']);
	$funcionario->setPassword($_POST['password']);
	$dao->Inserir($funcionario);

	
    header("Location: home.php");
    }

public function consultarFunc(){
		$dao = new FuncionarioDao;
		$func = $dao->BuscarFunc();
		return $func;
	 header("Location: funcionario.php");
    }

public function consultarServicosCadastrados(){
		$dao = new ServicoDao;
		$servicos = $dao->ConsultaServicos();
		return $servicos;
	 header("Location: home.php");
    } 	


 	
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) { // aqui é onde vai decorrer a chamada se houver um *request* POST
    $method = $_POST['method'];
    if(method_exists('Controle', $method)) {
        $controle = new Controle;
        $controle->$method($_POST);
    }
    else {
        echo 'Metodo incorreto';
    }
}



?>