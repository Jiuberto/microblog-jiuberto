<?php
require_once "../inc/cabecalho-admin.php";
require_once "../inc/funcoes-usuarios.php";
require_once

//verificando se o usuario pode acessar essa pagina
verificarTipo();

/* <!-- Pegando o valor do parametro id vindo da url --> */
$id = $_GET['id'];

/* Executando a função com o id e recuperando os dados do usuário selecionado */
$dadosUsuario = lerUmUsuarios($conexao, $id);

if (isset($_POST['atualizar'])) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$tipo = $_POST['tipo'];

	/* Lógica para tratamento da senha 
	Se o campo da senha estiver vazio OU se a senha digitada for a mesma Já existente no banco, então significa que o usuario NÃO ALTEROU A SENHA. Portanto, devemos manter a senha existente no banco */
	if (empty($_POST['senha']) || password_verify($_POST['senha'], $dadosUsuario['senha'])) {

		//Manter a mesma senha (copiamos ela para uma variavel)
		$senha = $dadosUsuario['senha'];
	} else {

		/* Caso cobtrário, pegaremos a senha nova digitada e a CODIFICAREMOS ANTES de mandar/salvar no banco. */
		$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	}
	//Chamomos/executamos o UPDATE através da função
	atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo);

	//Redirecionamos para a página que mostra todos usuários
	header("location:usuarios.php");
	//FIM IF ISSER
}
?>




<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">

		<h2 class="text-center">
			Atualizar dados do usuário
		</h2>

		<form autocomplete="off" class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input value="<?= $dadosUsuario['nome'] ?>" class="form-control" type="text" id="nome" name="nome" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input value="<?= $dadosUsuario['email'] ?>" class="form-control" type="email" id="email" name="email" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
			</div>

			<div class="mb-3">
				<label class="form-label" for="tipo">Tipo:</label>
				<select class="form-select" name="tipo" id="tipo" required>
					<option value=""></option>


					<option <?php if ($dadosUsuario['tipo'] == 'editor') echo 'selected' ?> value="editor">Editor</option>


					<option <?php if ($dadosUsuario['tipo'] == 'admin') echo 'selected' ?> value="admin">Administrador</option>


				</select>
			</div>

			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>

	</article>
</div>


<?php
require_once "../inc/rodape-admin.php";
?>