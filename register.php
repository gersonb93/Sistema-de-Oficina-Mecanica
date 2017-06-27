<?php
session_start();

//if(isset($_SESSION['usr_id'])) {
	//header("Location: register.php");
//}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$name_func = mysqli_real_escape_string($con, $_POST['name_func']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$sexo = mysqli_real_escape_string($con, $_POST['sexo']);
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name_func)) {
		$error = true;
		$name_error = "O nome deve ter letras e espacos";
	}
	
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Senha deve ter pelo menos 6 caracteres";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Senhas nao coincidem";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO func (name_func,password,sexo) VALUES('" . $name_func . "',  '" . $password . "',  '" . $sexo . "')")) {
			$successmsg = "Novo funcionario cadastrado! <a href='login.php'>Clica aqui para entrar</a>";
		} else {
			$errormsg = "Erro ao cadastrar, verifique os campos e tente novamente ";
		}
	}
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

<nav class=" navbar navbar-inverse navbar-static-top">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.html" class="navbar-brand logotipo">
               <img src="img/watchguru.png" alt="Watch Guru">
            </a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php" name="signup"><strong>Voltar</strong></a></li>
				<li><a href="logout.php" class="glyphicon glyphicon-off col-xs-12"></a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="register.php" method="post" name="signupform">
				<fieldset>
					<legend><strong>Cadastrar</strong></legend>


					<div class="form-group">
						<label for="name">Nome</label>   
						<input type="text" name="name_func" placeholder="Nome" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					
					
					<div class="form-group">
						<label for="name">Senha</label>
						<input type="password" name="password" placeholder="Senha" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirme a senha</label>
						<input type="password" name="cpassword" placeholder="Confirme sua senha" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group ">

                <label class="control-label" for="Servicos">Sexo</label>

                    <select id="sexo" name="sexo" class="form-control">

                    <option value="">Selecione...</option>

                    <option value="Feminino">Feminino</option>

                    <option value="Masculino">Masculino</option>

               
                </select>
                     <span class="text-danger"><?php if (isset($sexo_error)) echo $sexo_error; ?></span>

              </div>


					
				</fieldset>

				<div class="form-group">
						<input type="submit" name="signup" value="Cadastrar" class="btn btn-primary" />
						
					</div>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	
</div>
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
</body>
</html>



