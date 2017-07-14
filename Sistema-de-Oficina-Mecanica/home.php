<?php
include("controle.php");

$error = false;

if(($_SESSION['usr_name'])== null){
	  header("Location: index.php");
    }
$controle = new Controle;
$servicos = $controle->consultarServicosCadastrados();
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
                           <li><a href="register.php">Cadastrar Funcionario</a></li>
                           
                        </ul>

                        <li><a href="logout.php" class="glyphicon glyphicon-off col-xs-12"></a></li>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container">
         <ol class="breadcrumb">
            <li><a href="home.php">Ordens de Serviço</a></li>
            <li class="active">Ordens de Serviço</li>
         </ol>
         <div class="row cabecalho">
            <div class="col-xs-12 col-md-6">
               <h1>Ordens de Serviço</h1>
            </div>
            
         </div>
         <div class="table-responsive">
            <table class="dados-os table table-striped table-bordered table-hover">
               <thead>
			   
                  <tr>
                     <th>Protocolo</th>
                     <th>Data/hora</th>
                     <th>Cliente</th>
                     <th>Valor</th>
                     <th>Tipo de servico</th>
					 <th>Observação</th>
                     <th>Atendente</th>
                     <th>Status</th>
                     <th></th>
                  </tr>
               </thead>
              
            <tbody>
<?php foreach($servicos as $lista): ?>
                  <tr>
				  
				  
				  
                    
                     <td ><a><?php echo $lista['id']; ?></a></td>
                     <td pattern="dd-MM-yyyy"><a pattern="dd-MM-yyyy"><?php echo $lista['niceDate']; ?></a></td>
                     <td><a><?php echo $lista['name_cli']; ?></a> </td>
                     <td><a><?php echo $lista['vl_serv']; ?></a></td>
                     <td><a><?php echo $lista['tipo_serv']; ?></a></td> 
					 <td><a><?php echo $lista['obs']; ?></a></td> 
                     <td><a><?php echo $lista['name_atendente']; ?></a></td>
    <td><span class="label label-primary"><?php echo $lista['status']; ?></span></td>
                     <td class="text-center">
                        
						<!--<form action='mudar.php' method='post'>
                          <input type='text' id="id"  name="id" value="<?php echo $lista['id']; ?>" />
                          <button title="Mudar status" type='submit'> <span class="glyphicon glyphicon-thumbs-up"></span></button>
						</form> -->
						
						<form method="post" action="controle.php">
						<input type="hidden"  name="method" value="mudarStatus">
						<input type="hidden" name="id" value="<?php echo $lista['id']; ?>">
						<input type="submit"  value="Mudar Status">
						</form>
						<p />
						
						<form method="get" action="alterar.php">
						<input type="hidden"  name="method" value="consultarInformacoes">
						<input type="hidden" name="id" value="<?php echo $lista['id']; ?>">
						<input type="submit" value="Editar">
                        </form>
					    <form method="post" action="controle.php">
						<input type="hidden"  name="method" value="deletar">
						<input type="hidden" name="id" value="<?php echo $lista['id']; ?>">
						<input type="submit" value="Deletar"> 
						
                        </form> 
					 </td>
					 
                  </tr>
				  <?php endforeach; ?>
				  
				  
               </tbody>
            </table>
         </div>
         <footer class="row">
            <div class="col-sm-6">
               <button class="btn btn-primary" data-toggle="modal" data-target="#NovaOS">Nova Ordem de Serviço</button>
            </div>
            <div class="col-sm-6 paginacao text-right">
               <ul class="pagination">
                  <li class="active"><a href=""><span>«</span></a></li>
                  
               </ul>
            </div>
         </footer>
      </div>
      <div class="modal fade" id="NovaOS">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" data-dismiss="modal" class="close">
                  <span>&times;</span>
                  </button>
                  <h4 class="modal-title">Nova Ordem de Serviço</h4>
               </div>
               <form role="form" action="controle.php" method="post" name="signupsform" >
			   <input type="hidden" name="method" value="cadastrar">
                  <div class="modal-body">
                     
                     
                    
                     <div class="row">
                        <div class="form-group col-sm-5">
                           <label class="control-label" for="Cliente">Cliente</label>
                           <input type="text" name="name_cli" required class="form-control">
                        </div>
                        <div class="form-group col-sm-5">
                           <label class="control-label" name="tipo_serv" for="Servicos">Serviços</label>
                           <select id="Servicos"  name="tipo_serv" required class="form-control">
                              <option value="">Selecione...</option>
                              <option value="Troca de Pastilha de freio">Troca de Pastilha de freio</option>
                              <option value="Conserto de Engrenagem">Conserto de Engrenagem</option>
                              <option value="Troca de Bateria">Troca de Bateria</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group  col-xs-12">
                           <label class="control-label" for="Observacao">Observação</label>
                           <textarea id="Observacao" name="obs" required class="form-control" rows="3"></textarea>
                        </div>


                     </div>

                     <div class="row">
                        <div class="form-group  col-sm-4">
                           <label class="control-label" >Data</label>
                           <input required class="form-control" type="date" name="dt_serv">
                        </div>

                        
                     </div>
                     <div class="row">
                        <div class="form-group col-sm-4">
                           <label class="control-label" for="Valor">Valor</label>
                           <div class="input-group">
                              <div class="input-group-addon">R$</div>

                              <input type="number" name="vl_serv" id="Valor" required   required class="form-control" >
                              
                           </div>
                        </div>
                     </div>
                  </div>
				  
				  <input type="text" style="display:none" name="name_atendente" value="<?php echo $_SESSION['usr_name']; ?>">
				  <input type="text" style="display:none" name="status" value="Novo">

                  <div class="modal-footer">
                     <button type="reset" class="btn btn-danger">Limpar</button>
                     <button type="submit" name="signups" class="btn btn-primary">Salvar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
	  
	  <!-------------------------------------------------------------------------------------------------------------------------------------------------------
	  ---------------------------------------------------------------------------------------------------------------------------------------------------------
	  ---------------------------------------------------------------------------------------------------------------------------------------------------------
	    ---->
		
		
      
		
		<!----------------------------------------------------------------------------------------------------------------------------------------------------
		-------------------------------------------------------------------------------------------------------------------------------------------------------
		------------------------------------------------------------------------------------------------------------------------------------------------------
		-->
		
		
	 
	  
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
   </body>
   
</html>