<?php
/* Sessõs do php 
Recursos usados para o controle de acesso à determinadas páginas e/ou recursos do site.

Exemplo: area administrativa, painel de controle, area de cliente/aluno etc.

Nestas areas o acesso só é possivel mediante alguma forma de autenticação. Exemplos: login/senha, digital, facial etc.
*/

//Verificar se não há uma sessão já em funcionamento

if (!isset($_SESSION)) {
    // se não tem, então inicie uma sessão
    session_start();
}

function VerificaAcesso(){
    /* Se não existir uma variavel de sessão chamada "idi"(baseada nos ids usuários do banco), então significa que o usuário NÃO ESTÁ LOGADO */
    if (!isset($_SESSION['id'])) {
       // Portanto, destruímos a sessão
        session_destroy();

        // Fazemos o usuário voltar para a página login
       header("location:../login.php?acesso_negado");

       // Paramos qualquer outra execução/processamento
       exit; // ou die()
    }

}

function login($id, $nome, $tipo){
    //Variaveis de sessão
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;
}

function logout(){
    session_destroy();
    header("location:../login.php?saiu"); //redirecionamento de tela
    exit; // ou die();
}

function verificarTipo(){
    /* Se o tipo do usuario logado na sessão não for admin(os, seja se diferente de admin) */
    if ($_SESSION['tipo'] != "admin") {
        //Então, redirecione para não autorizado
        header("location:nao-autorizado.php");
        exit;
    }
}

?>