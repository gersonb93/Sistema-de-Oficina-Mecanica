<?php
session_start();
include_once 'dbconnect.php';



if (isset($_POST['id'])) {
     $del = "UPDATE servico SET name_cli='".$_POST['name_cli']."', tipo_serv='".$_POST['tipo_serv']."',obs='".$_POST['obs']."',dt_serv='".$_POST['dt_serv']."', vl_serv='".$_POST['vl_serv']."' WHERE id='".$_POST['id']."'";
     $delgo = mysqli_query($con,$del) or die('Erro');
     echo "Atualizado";
	 header("Location: home.php");
}



?>