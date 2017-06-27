<?php
session_start();
include_once 'dbconnect.php';



if (isset($_GET['id'])) {
     $del = "DELETE FROM servico WHERE id = " . $_GET['id'];
     $delgo = mysqli_query($con,$del) or die('Erro ao deletar');
     echo "deletado";
	 header("Location: home.php");
}



?>