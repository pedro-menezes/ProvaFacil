<?php
	require "../pattern/config.php";// carrega as constantes
	require "connection.php";

  $usuario = DBRead("professor", "WHERE proNome = '".$_POST["proNome"]."' AND proSenha=md5('".$_POST["proSenha"]."')");
  var_dump($usuario);
  if ($usuario){
    echo 'entrou!';
    session_start();
    $_SESSION["proNome"] = $_POST["proNome"]."x";
    echo '<meta http-equiv="refresh" content=0;url="../index1.php">';
  } else {
    echo 'não entrou!';
    echo "<script>alert('Falha ao autenticar o login!');</script>";
    session_unset();
    //session_destroy();
    echo '<meta http-equiv="refresh" content=0;url="../login.php">';
  }


?>
