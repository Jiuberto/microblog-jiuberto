<?php
/* Acessando os dados da conexão ao servidor */
require "conecta.php";

function inserirUsuario( $conexao, $nome, $email, $tipo, $senha ){
// Montando o comando SQL em uma varíavel
    $sql = "INSERT INTO usuarios(nome, email, tipo, senha)
    VALUES('$nome', '$email', '$tipo', '$senha')";

    // Executando o comando no banco
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


function lerUsuarios($conexao){
    // Comando SQL
    $sql = "SELECT id, nome, tipo, email FROM usuarios";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Retornamos o resultado TRANSFORMANDO  em array associativo
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}