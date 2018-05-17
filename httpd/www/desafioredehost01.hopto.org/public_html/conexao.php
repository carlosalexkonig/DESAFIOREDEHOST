<?php
	// dados de conexão do PHP com MYSQL
	$host	= "187.84.228.107"; // IP da hospedagem, dedicado ou servidor local
	$user	= "foouser"; // usuario do Mysql (padrao = root)
	$pass	= "abc"; // senha do mysql (padrao = sem senha)
	$dbname	= "DESAFIOREDEHOST"; // nome do banco de dados

	// função de conexao com banco de dados
	$conexao = mysqli_connect($host, $user, $pass, $dbname);

	// validação da conexao com mysql e retorno de log
	if (!$conexao)
	{
		die ("erro de conexao mysql: ".mysqli_connect_error());
	}
	/*
	else
	{
		echo "conexao com mysql bem sucedida!";
	};
	*/
?>