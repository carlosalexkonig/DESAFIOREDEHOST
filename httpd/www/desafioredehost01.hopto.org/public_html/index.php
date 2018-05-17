<html>
<head>
<title>Bem vindo ao DESAFIOREDEHOST01</title>
</head>
<body>
</br>
</br>
</br>
<center>
</br>
</br>
<table>Bem vindo ao DESAFIOREDEHOST01 - OFICIAL</table>
</br>
</br>
<table>
<?php 
/* variaveis de conexao com banco mysql */
$host = "187.84.228.107";
$user = "foouser";
$pass = "abc";
$dbname = "DESAFIOREDEHOST";

/* conexao com mysql */
$conn = mysqli_connect($host, $user, $pass, $dbname);
/* validação da conexao com mysql */
if(!$conn){
	die("erro de conexao: ".mysqli_connect_error());
}
else{
	echo "Conectado com o bando de dados!<br><br>";
};

Print "HOSTNAME:"; echo exec('hostname');
Print  "</BR>";
Print  "</BR>";
echo  "Databases armazenados aqui:";
Print  "<br>";
	$link = mysqli_connect($host,$user, $pass) or die(mysqli_connect_error($link));
Print  "<br>";
	$res = mysqli_query($link, "SHOW DATABASES;");
	while ($row = mysqli_fetch_assoc($res)) {
	echo $row['Database'] . "\n";
	}

	/* fechamento da conexao com mysql */
mysqli_close($conn);

?>
</tr>
</br>
</br>
</br>
</br>
</br>
<a href=http://desafioredehost02.hopto.org/index.php>VISITE MEU OUTRO TESTE CLICANDO AQUI!</a>
</br>
</br>
</br>
</table>
</center>
</body>
</html>