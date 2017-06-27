<?php
session_start();
include_once 'dbconnect.php';

     //isset($_POST['id']);
     

	 if(isset($_GET['id'])){
	 $del = "SELECT from servico WHERE id = " . $_GET['id'];
     $delgo = mysqli_query($con,"SELECT * from servico WHERE id = " . $_GET['id']) or die('Erro');
	 //$row = mysql_fetch_array($delgo);
	 
	 foreach($delgo as $lista){
 $row = $lista;
    //header("Location: index.php")

	 
	 
	 

	if($lista['status'] == "Novo"){
	$mm = "UPDATE servico set status = 'Em Andamento' WHERE id = " . $_GET['id'];
    $mm1 = mysqli_query($con,$mm) or die('Erro');
	header("Location: home.php");
	}else if($lista['status'] == "Em Andamento" ){
	$mm = "UPDATE servico set status = 'Finalizado' WHERE id = " . $_GET['id'];
    $mm1 = mysqli_query($con,$mm) or die('Erro');
	header("Location: home.php");
	}

	 }
	 }else{
		 echo 'Erro';
	 }
?>

