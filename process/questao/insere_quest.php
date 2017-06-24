<?php
	require "../../pattern/config.php";// carrega as constantes
	require "../../process/connectiondb.php";
	$quest = array("queEnunciado"=> 0, "que_temCodigo" => 0);
	$quest = array(
		"queEnunciado" => $_POST['queEnunciado'],
		"que_temCodigo" => $_POST['que_temCodigo']
	);

	$grava = DBCreate('questao', $quest);
	if($grava){
		echo ":-)";
		echo"<script>alert('Sucesso');</script>;";
	}else{
		echo ":/";
		echo"<script>alert('Falha');</script>;";
	}
	echo '<meta http-equiv="refresh" content=1;url="..\..\pages\cad_quest.html">';
?>
