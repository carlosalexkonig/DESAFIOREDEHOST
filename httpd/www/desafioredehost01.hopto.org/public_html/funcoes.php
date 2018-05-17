<?php

	function visualizarDadosGerais($conexao)
	{
		// query de visualizaçao de todos dados
		$query = "SELECT * FROM contact_form_info";
		// execuçao da query de visualizaçao de dados
		$resultado = mysqli_query($conexao, $query);
		// validaçao da query de visualizaçao de dados
		if (mysqli_num_rows($resultado) > 0)
		{
			while ($row = mysqli_fetch_assoc($resultado))
			{
				echo "id: ".$row["id"]." nome: ".$row["name"]." email: ".$row["email"]." Telefone: ".$row["phone"]." Comentarios: ".$row["comments"]. "<br>";
			}
		}
		else
		{
			return "nenhum resultado encontrado!";
		}

		// fechamento da conexao com mysql
		//mysqli_close($conexao);
	}

	function visualizarDadosEspecificos($conexao, $name)
	{
		// validações de dados
		if (!$_POST['name'])
		{
			return "o preenchimento do campo NOME é obrigatório!";
		}

		// query de visualizaçao de dados especificos
		$query = "SELECT * FROM contact_form_info WHERE name = '$name'";
		/* execuçao da query de visualizaçao de dados */
		$resultado = mysqli_query($conexao, $query);
		// validaçao da query de visualizaçao de dados
		if (mysqli_num_rows($resultado) > 0)
		{
			while ($row = mysqli_fetch_assoc($resultado))
			{
				echo "id: ".$row["id"]." nome: ".$row["name"]." email: ".$row["email"]." Telefone: ".$row["phone"]." Comentarios: ".$row["comments"]. "<br>";
			}
		}
		else
		{
			return "nome invalido!";
		}

		// fechamento da conexao com mysql
		//mysqli_close($conexao);
	}

	function inserirDados($conexao, $name, $email, $phone, $comments)
	{
		// validações de dados
		if (!$_POST['name'])
		{
			return "o preenchimento do campo NOME é obrigatório!";
		}
		if (!$_POST['email'])
		{
			return "o preenchimento do campo EMAIL é obrigatório!";
		}
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			return "o formato do email é inválido!";
		}
		if (!$_POST['phone'])
		{
			return "o preenchimento do campo TELEFONE é obrigatório!";
		}
		if (!$_POST['comments'])
		{
			return "o preenchimento do campo COMENTARIO é obrigatório!";
		}
		//if (strlen($_POST['nomeDoCampo']) < 4)
		//{
			//return "nomeDoCampo deve ter no minimo 4 digitos!";
		//}

		// query de inserçao de dados
		$query = "INSERT INTO contact_form_info (name,email,phone,comments) VALUES ('$name','$email','$phone','$comments')";
		/* execuçao da query de inserçao de dados */
		$resultado = mysqli_query($conexao, $query);
		/* validaçao da query de inserçao de dados*/
		if ($resultado)
		{
			return "dados inseridos com sucesso! <br><br>";
		}
		else
		{
			return "erro ao inserir dados: ".$resultado."<br>".mysqli_error($conexao);
		}

		// fechamento da conexao com mysql
		//mysqli_close($conexao);
	}

	function atualizarDados($conexao, $name, $phone)
	{
		// validações de dados
		if (!$_POST['name'])
		{
			return "o preenchimento do campo NOME é obrigatório!";
		}
		if (!$_POST['phone'])
		{
			return "o preenchimento do campo NOVO TELEFONE é obrigatório!";
		}

		// query de atualizaçao de dados
		$query = "UPDATE contact_form_info SET phone = '$phone' WHERE name = '$name'";
		/* execuçao da query de atualizaçao de dados */
		$resultado = mysqli_query($conexao, $query);
		/* validaçao da query de atualizaçao de dados*/
		if ($resultado)
		{
			return "dados atualizados com sucesso! <br><br>";
		}
		else
		{
			return "erro ao atualizar dados: ".$resultado."<br>".mysqli_error($conexao);
		}

		// fechamento da conexao com mysql
		//mysqli_close($conexao);
	}

	function apagarDados($conexao, $name)
	{
		// validações de dados
		if (!$_POST['name'])
		{
			return "o preenchimento do campo NOME é obrigatório!";
		}

		// query de remoçao de dados
		$query = "DELETE FROM contact_form_info WHERE name = '$name'";
		/* execuçao da query de remoçao de dados */
		$resultado = mysqli_query($conexao, $query);
		/* validaçao da query de remoçao de dados*/
		if ($resultado)
		{
			return "dados apagados com sucesso! <br><br>";
		}
		else
		{
			return "erro ao apagar dados: ".$resultado."<br>".mysqli_error($conexao);
		}

		// fechamento da conexao com mysql
		//mysqli_close($conexao);
	}
