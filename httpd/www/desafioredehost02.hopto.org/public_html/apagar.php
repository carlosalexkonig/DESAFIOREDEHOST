<html>
 <head>
  <title>Bem vindo ao desafioredehost02</title>
 </head>
 <body>
 <font face="verdana" color="red">
 <center>
 <a href=index.php>Voltar</a>
 <br><br>
 Para apagar seus dados de nossa base, digite APENAS seu NOME COMPLETO, conforme cadastrado no site:<BR>
 <a href=mostrar.php>(consulte aqui)</a>
 
 <br><br>
 <form action="apagar.php" method="post">
 <table align=center>
 <tr><td>Nome: <input type="text" name="alvo"></td></tr>
 <tr><td align=center><input type="submit"></td></tr>
 <tr><td></td></tr>
 </table>
 </form>
 <br><br>
 <?php 
/* variaveis de conexao com banco mysql */
$host = "187.84.228.107";
$user = "foouser";
$pass = "abc";
$dbname = "DESAFIOREDEHOST";

/* variaveis do formulario */
$alvo = $_POST["alvo"];

/* validações de dados do formulario */

if (!$_POST['alvo']){
	echo "não é permitido nome vazio";
	return;
}

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

/* variavel da query de deleçao de dados */
$queryC = "DELETE FROM contact_form_info WHERE name = '$alvo'";
/* execuçao da query de deleçao de dados */
$deletado = mysqli_query($conn, $queryC);
/* validaçao da query de deleçao de dados*/
if($deletado){
	echo "dados apagados com sucesso! <br><br>";
}
else{
	"erro ao deletar: ".$deletado."<br>".mysqli_error($conn);
}

/* fechamento da conexao com mysql */
mysqli_close($conn);
?>
</center>
</font>
</body>
</html>
