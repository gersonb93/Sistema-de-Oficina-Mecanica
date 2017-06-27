<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
  header("Location: home.php");
}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

  $name_func = mysqli_real_escape_string($con, $_POST['name_func']);
  $password =  mysqli_real_escape_string($con, $_POST['password']);
  $result =  mysqli_query($con, "SELECT * FROM func WHERE name_func = '" . $name_func. "' and password = '" . $password . "'");

  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['usr_id'] = $row['password'];
    $_SESSION['usr_name'] = $row['name_func'];
    header("Location: home.php");
  } else {
    $errormsg = "Usuário ou senha incorretos!";
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

  <link rel="stylesheet" href="css/login.css">

</head>

<body>



  <div class="login-form col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

  	<header>

  		<h1><img class="img-responsive" src="img/watchguru.png"></h1>

  		

  	</header>


     <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
  	

           <h2 class="text-center">Entre com seu <b>usuário</b> e <b>senha</b></h2>

  		<div class="form-group">

  			<div class="input-group">

  				<div class="input-group-addon">

  					<span class="glyphicon glyphicon-user"></span>

  				</div>

  				<input type="text" name="name_func" required class="form-control" placeholder="Usuário">

  			</div>

  		</div>



  		<div class="form-group">

  			<div class="input-group">

  				<div class="input-group-addon">

  					<span class="glyphicon glyphicon-option-horizontal"></span>

  				</div>

  				

          <input type="password" name="password" placeholder="Senha" required class="form-control" />

  			</div>

  		</div>



  		<footer>

  			<div class="checkbox pull-left">

  				<label><input type="checkbox" name="lembrar">Lembrar de mim</label>

  			</div>

  			

          <div class="form-group">
            <input type="submit" name="login" value="Entrar" class="btn btn-primary pull-right" />
          </div>



  		</footer>

  	</form>

    <span class="text-danger" ><?php if (isset($errormsg)) { echo $errormsg; } ?></span>


  </div>



  <script src="js/jquery-3.2.1.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

</body>

</html>