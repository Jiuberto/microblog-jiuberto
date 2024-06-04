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
       header("location:../login.php");

       // Paramos qualquer outra execução/processamento
       exit; // ou die()
    }
}
?>