<html>
 <head>
  <title>Bem vindo ao desafioredehost02</title>
 </head>
<body>
<center>
<font face="verdana" color="white">
<a href=index.php>Voltar</a>
<br><br><br><br>
<form action="inserir.php" method="post" align=center>
<table align=center>
<tr><td align="center">INSERIR DADOS:</td></tr>
<tr><td align="right">Nome: <input type="text" name="name" align="right"></td></tr>
<tr><td align="right">E-mail: <input type="text" name="email" align="right"></td></tr>
<tr><td align="right">Fone: <input type="text" name="phone" align="right"></td></tr>
<tr><td align="right">Comentario: <input type="text" name="comments" align="right"></td></tr>
<tr><td align="right"><input type="submit"></td></tr>
</table>
</form>
</center>

<br><br>
 <?php 
/* variaveis de conexao com banco mysql */
$host = "187.84.228.107";
$user = "foouser";
$pass = "abc";
$dbname = "DESAFIOREDEHOST";

/* variaveis do formulario */
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$comments = $_POST["comments"];

/* validações de dados do formulario */

if (!$_POST['name']){
	echo "não é permitido nome vazio";
	return;
}
if (!$_POST['email']){
	echo "não é permitido email vazio";
	return;
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	echo "formato de email invalido";
	return;
}
if (!$_POST['phone']){
	echo "não é permitido fone vazio";
	return;
}
if (!$_POST['comments']){
	echo "não é permitido comentario vazio";
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

/* variavel da query de inserção de dados */
$queryB = "INSERT INTO contact_form_info (name,email,phone,comments) VALUES ('$name','$email','$phone','$comments')";
/* execuçao da query de inserçao de dados */
$dados = mysqli_query($conn, $queryB);
/* validaçao da query de inserçao de dados*/
if($dados){
	echo "dados inseridos com sucesso! <br><br>";
}
else{
	"erro ao inserir: ".$dados."<br>".mysqli_error($conn);
}

/* fechamento da conexao com mysql */
mysqli_close($conn);
?>
</font>
</body>
</html>
