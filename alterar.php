<?php
session_start();
include_once 'dbconnect.php';


if(($_SESSION['usr_name'])== null){
	  header("Location: index.php");
    }


 if(isset($_GET['id'])){
	 $del = "SELECT id, name_cli,DATE_FORMAT(dt_serv,'%d/%m/%Y') AS niceDate, tipo_serv, obs, vl_serv, name_atendente, status from servico WHERE id = " . $_GET['id'];
     $delgo = mysqli_query($con,$del) or die('Erro ao tentar pegar informações do banco');
	 //$row = mysql_fetch_array($delgo);
	 
	 foreach($delgo as $lista){
     $row = $lista;
    //header("Location: index.php")
	 }
	 }else{
		 echo 'Erro';
	 }

?>




<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title></title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/index.css">
   </head>
   <body>
      <nav class="navbar navbar-inverse navbar-static-top">
         <div class="container-fluid">
      <!-- add header -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
               <a href="home.php" class="navbar-brand logotipo">
               <img src="img/watchguru.png" alt="Watch Guru">
               </a>
            </div>
            <div class="collapse navbar-collapse" id="menu">
               <ul class="nav navbar-nav">
                  <li><a href="home.php">Ordens de Serviço</a></li>
                  <li><a href="funcionario.php">Funcionários</a></li>
                  <li><a href="servico.php">Serviços</a></li>

               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li>
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     Minha Conta
                     <span class="caret"></span>
                     </a>
                     <div class="dropdown-menu perfil">
                        <div class="col-sm-4 hidden-xs">
                           <img class="img-responsive img-rounded" src="https://api.adorable.io/avatars/100/watchuru.png">
                        </div>
                        <ul class="list-unstyled col-sm-8">
                           
                           
                                                            
                           <li><a><?php echo $_SESSION['usr_name']; ?></a></li>
                                                                                   
                           <li><a href="">Alterar Perfil</a></li>
                           <li><a href="register.php">Cadastrar Funcionario</a></li>
                           
                        </ul>

                        <li><a href="logout.php" class="glyphicon glyphicon-off col-xs-12"></a></li>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
		 
		 
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" data-dismiss="modal" class="close">
                  <span>&times;</span>
                  </button>
                  <h4 class="modal-title">Edição de Ordem de Serviço</h4>
               </div>
               <form role="form" action="altera2.php" method="post" name="signupsform" >
                  <div class="modal-body">
                     
                     
					 <div class="row">
                        <div class="form-group  col-sm-4">
                           <label class="control-label" >Protocolo</label>
                           <input readonly="true" required class="form-control" name="id"  value="<?php echo $lista['id']; ?>" type="text" name="niceDate">
                        </div>
						
                        
                     </div>
					 
                    
                     <div class="row">
                        <div class="form-group col-sm-5">
                           <label class="control-label" for="Cliente">Cliente</label>
                           <input type="text" name="name_cli" value="<?php echo $lista['name_cli']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-sm-5">
                           <label class="control-label" name="tipo_serv" for="Servicos">Serviços</label>
                           <select id="Servicos"  value="<?php echo $lista['tipo_serv']; ?>" name="tipo_serv" required class="form-control">
                              <option  value="">Selecione...</option>
                              <option id="Troca de Pastilha de freio" name="Troca de Pastilha de freio" value="Troca de Pastilha de freio">Troca de Pastilha de freio</option>
                              <option id="Conserto de Engrenagem" name="Conserto de Engrenagem" value="Conserto de Engrenagem">Conserto de Engrenagem</option>
                              <option id="Troca de Bateria" name="Troca de Bateria" value="Troca de Bateria">Troca de Bateria</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group  col-xs-12">
                           <label class="control-label" for="Observacao">Observação</label>
                           <input id="Observacao" name="obs"  value="<?php  echo $lista['obs']; ?>" required class="form-control" rows="3" />
                        </div>


                     </div>

                     <div class="row">
                        <div class="form-group  col-sm-4">
                           <label class="control-label" >Data</label>
                           <input required class="form-control"  value="<?php echo $lista['niceDate']; ?>" type="date" name="dt_serv">
                        </div>

						</div>
						<div class="row">
                        <div class="form-group  col-sm-4">
                           <label class="control-label" >Atendente</label>
                           <input readonly="true" required class="form-control"  value="<?php echo $lista['name_atendente']; ?>" type="text" name="name]">
                        </div>
						
                        
                     </div>
					 
					 <div class="row">
                        <div class="form-group  col-sm-4">
                           <label class="control-label" >Status</label>
                           <input readonly="true" required class="form-control"  value="<?php echo $lista['status']; ?>" type="text" name="status">
                        </div>
						
                        
                     </div>
                     <div class="row">
                        <div class="form-group col-sm-4">
                           <label class="control-label" for="Valor">Valor</label>
                           <div class="input-group">
                              <div class="input-group-addon">R$</div>

                              <input type="number" name="vl_serv" value="<?php echo $lista['vl_serv']; ?>" id="Valor" required   required class="form-control" >
                              
                           </div>
                        </div>
                     </div>
                  </div>
				  

                  <div class="modal-footer">
                     <button type="reset" class="btn btn-danger">Limpar</button>
                     <button type="submit" name="signups" class="btn btn-primary">Salvar</button>
                  </div>
               </form>
            </div>
         </div>
      
		 
	  
	  <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
   </body>
   
</html>