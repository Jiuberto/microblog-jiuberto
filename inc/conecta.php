<?php /* Script de conexão ao servidor de banco de dados Nescessário para que o Microblog possa usra o MySQL */

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "lemel";

// Função para conexão com o servidor do banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

//Definindo o charset da conexão para utf8
mysqli_set_charset($conexao, "utf8");

/* Fazendo um teste de conexão */
// ! testa conexão
/* if ( !$conexao ) {
    // Deu problema? "Mate/pare" a aplicação!
    die("Deu ruim: " .mysqli_connect_error());
} else {
    echo "Conect";
} */
?>;