<?php
include("controle.php");
$error = false;

if(($_SESSION['usr_name'])== null){
	  header("Location: index.php");
    }

$controle = new Controle;

$funcionario = $controle->consultarFunc();

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
            <li class="active">Funcionários</li>
         </ol>
        
		 
         <div class="table-responsive">
            <table class="dados-os table table-striped table-bordered table-hover">
               <thead>
			   
                  <tr>
                     <th>Id</th>
                     <th>Nome</th>
                     <th>Sexo</th>
                     </tr>
               </thead>
              
            <tbody>
                 <?php foreach($funcionario as $lista): ?>
       
                  <tr>
				  
				  
				  
                    
                     <td ><a><?php echo $lista['id']; ?></a></td>
                     <td><a><?php echo $lista['name_func']; ?></a> </td>
                     <td><a><?php echo $lista['sexo']; ?></a></td>
 
					 
                  </tr>
				  <?php endforeach; ?>
				  
				  
               </tbody>
            </table>
         </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
</body>
</html>