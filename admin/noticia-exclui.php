<?php
require_once "../inc/funcoes-noticias.php";
require_once "../inc/funcoes-sessao.php";

//verificando se o usuario pode acessar essa pagina
VerificaAcesso();

//Obter o id que sera excluido
$idNoticia = (int)$_GET['id'];
$idUsuario = (int)$_GET['id'];
$tipoUsuario = (int)$_GET['id'];

// Chamar/executar a função que irá fazer o DELETE
excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario);

//Redirecionamento para a página de usuário
header("location:noticias.php");

?>