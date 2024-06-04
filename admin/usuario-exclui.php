<?php
require_once "../inc/funcoes-usuarios.php";

//Obter o id que sera excluido
$id = $_GET['id'];

// Chamar/executar a função que irá fazer o DELETE
excluirUsuario($conexao, $id);

//Redirecionamento para a página de usuário
header("location:usuarios.php");

?>