<?php
require_once "../inc/funcoes-usuarios.php";
require_once "../inc/funcoes-sessao.php";

//verificando se o usuario pode acessar essa pagina
verificarTipo();

//Obter o id que sera excluido
$id = (int)$_GET['id'];

// Chamar/executar a função que irá fazer o DELETE
excluirUsuario($conexao, $id);

//Redirecionamento para a página de usuário
header("location:usuarios.php");

?>