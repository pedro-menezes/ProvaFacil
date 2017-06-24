<?php
	include "/../pattern/database.php";
		
	//pode executar inserções, ou atualizações na tabela.
	function DBExecute($query){
		$link =DBConnect();
		$result = mysqli_query($link, $query)or die(mysqli_error($link));
		DBClose($link);
		return $result;
	}
	
	//insere registro, recebe o nome da tabela e os dados em um array
	function DBCreate($table,$data){
		$data = DBEscape($data);
		$fields = implode(",", array_keys($data));
		$values = "'".implode("', '", $data)."'";
		$query = "INSERT INTO {$table} ({$fields}) VALUES ($values)";
		return DBExecute($query);
	}

	//Proteje contra sql injection
	function DBEscape($dados){
		$link = DBConnect();
		
		if 	(!is_array($dados)){
			$dados = mysqli_real_escape_string($link,$dados);
		} else{
			$arr = $dados;
			foreach($arr as $key => $value){
					$key =  mysqli_real_escape_string($link,$key);
					$value =  mysqli_real_escape_string($link,$value);
					$dados[$key] = $value;
			}
		}
		
		DBClose($link); 	
		return $dados;		 
	}
	
	?>