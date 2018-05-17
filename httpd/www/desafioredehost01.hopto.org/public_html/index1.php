<html>
	<head>
		<title>Bem vindo ao desafioredehost02</title>
	</head>
	<body>
		<br><br>
		VISUALIZAR DADOS GERAIS:
		<br><br>
			<form action="index.php" method="post">
			<input type="submit" name="visualizarTodos" id="visualizarTodos">
			</form>
		<br><br>
		VISUALIZAR MEUS DADOS:
		<br><br>
			<form action="index.php" method="post">
			<input type="submit" name="visualizar" id="visualizar">
			</form>
		<br><br>
		INSERIR DADOS:
		<br><br>
			<form action="index.php" method="post">
				Nome: <input type="text" name="name"><br>
				E-mail: <input type="text" name="email"><br>
				Telefone: <input type="text" name="phone"><br>
				Comentário: <input type="text" name="comments"><br>
				<input type="submit" name="inserir" id="inserir">
			</form>
		<br><br>
		ATUALIZAR DADOS:
		<br><br>
			<form action="index.php" method="post">
			Nome Atual: <input type="text" name="name"><br>
			Telefone Novo: <input type="text" name="phone"><br>
			<input type="submit" name="atualizar" id="atualizar">
			</form>
		<br><br>
		APAGAR DADOS:
		<br><br>
			<form action="index.php" method="post">
			Nome: <input type="text" name="name"><br>
			<input type="submit" name="apagar" id="apagar">
			</form>
		<br><br>
	<?php
		include("config.php");
		include("funcoes.php");

		if (isset($_POST['visualizarTodos']))
		{
			visualizarDadosGerais($conexao);
		}

		if (isset($_POST['visualizar']))
		{
			// variaveis de remoçao - não obrigatórias, podemos passa o post direto na função
			$name = $_POST["name"];

			// exemplo usando variaveis
			visualizarDadosEspecificos($conexao, $name);

			// exemplo sem variaveis, usando post direto
			//visualizarDadosEspecificos($conexao, $_POST["name"]);
		}

		if (isset($_POST['inserir']))
		{
			// variaveis de inserção - não obrigatórias, podemos passa o post direto na função
			$name = $_POST["name"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$comments = $_POST["comments"];

			// exemplo usando variaveis
			inserirDados($conexao, $name, $email, $phone, $comments);

			// exemplo sem variaveis, usando post direto
			//inserirDados($conexao, $_POST["name"], $_POST["email"], $_POST["phone"], $_POST["comments"]);
		}

		if (isset($_POST['atualizar']))
		{
			// variaveis de atualizaçao - não obrigatórias, podemos passa o post direto na função
			$name = $_POST["name"];
			$phone = $_POST["phone"];

			// exemplo usando variaveis
			atualizarDados($conexao, $name, $phone);

			// exemplo sem variaveis, usando post direto
			//atualizarDados($conexao, $_POST["name"], $_POST["phone"]);
		}

		if (isset($_POST['apagar']))
		{
			// variaveis de remoçao - não obrigatórias, podemos passa o post direto na função
			$name = $_POST["name"];

			// exemplo usando variaveis
			apagarDados($conexao, $name);

			// exemplo sem variaveis, usando post direto
			//apagarDados($conexao, $_POST["name"]);
		}
	?>
	</body>
</html>
