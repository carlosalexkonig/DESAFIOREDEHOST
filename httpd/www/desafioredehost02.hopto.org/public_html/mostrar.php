<html>
 <head>
  <title>Bem vindo ao desafioredehost02</title>
 </head>
<body>
<center>
<font face="verdana"><br>
<a href=index.php>Voltar</a>
<br><br><br><br><br><br>
<table align=center>
<tr align=center><td>VISUALIZAR DADOS:</td></tr>
</table>
<br><br>
<table>
<tr>
<td>
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
/*
else{
	echo "conexao bem sucedida";
};
*/

/* variavel da query de seleçao de dados */
$queryA = "SELECT * FROM contact_form_info";
/* execuçao da query de seleçao de dados */
$resultado = mysqli_query($conn, $queryA);
/* validaçao e exibiçao da query de seleçao de dados*/
if(mysqli_num_rows($resultado)>0){
while($row = mysqli_fetch_assoc($resultado)){
	echo " Nome: ".$row["name"]." E-mail: ".$row["email"]." Telefone: ".$row["phone"]." Comentarios: ".$row["comments"]. "<br>";
}
}
else{
	echo "0 resultados";
}

/* fechamento da conexao com mysql */
mysqli_close($conn);
?>
</td>
</tr>
</table>
<br><br><br><br>
</font>
</center>
</body>
</html>