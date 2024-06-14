<?php

require "conecta.php";

function formataData($data)
{
    return date("d/m/Y H:i", strtotime($data));
}

function upload($arquivo)
{

    /* Array para a validação dos tipos permitidos */
    $tiposValidos = ["image/png", "image/jpeg", "image/gif", "image/svg+xml"];

    /* Verificando se o tipo do arquivo Não é um dos arquivos existentes no array tiposValidos */
    if (!in_array($arquivo['type'], $tiposValidos)) {
        echo "<script>
        alert('Formato invalido);
        history.back();
        </script>";
    }

    /* Pegando apenos o nome/extensão do arquivo */
    $nome = $arquivo['name'];

    /* Obtendo do servidor o local/nome temporário para o processo de upload */
    $temporario = $arquivo['tmp_name'];

    /* Definindo da pasta de destino + nome do arquivo da imagem */
    $destino = "../imagens/" . $nome;

    /* Movendo o arquivo/imagem de area temporaria para a pasta de destino indicado (imagens) */
    move_uploaded_file($temporario, $destino);
}

function inserirNoticia($conexao, $titulo, $texto, $resumo, $nomeImagem, $usuarioId)
{
    $sql = "INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id) VALUES ('$titulo', '$texto', '$resumo', '$nomeImagem', '$usuarioId')";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function lerNoticias($conexao, $idUsuario, $tipoUsuario)
{

    if ($tipoUsuario == 'admin') {
        //pode ver tudo

        $sql = "SELECT
    noticias.id,
    noticias.titulo,
    noticias.data,
    usuarios.nome
      FROM noticias JOIN usuarios
     ON noticias.usuario_id = usuarios.id 
     ORDER BY data DESC";
    } else {
        //pode ver somente do proprio usuario

        $sql = "SELECT titulo, data, id FROM noticias
        WHERE usuario_id = $idUsuario
        ORDER BY data DESC";
    }



    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function lerUmaNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario)
{

    if ($tipoUsuario == 'admin') {
        // Pode ver qualquer noticia
        $sql = "SELECT * FROM noticia WHERE id = $idNoticia";
    } else {
        // ver somente sua noticia (basta sbaer qual a noticia e o )
        $sql = "SELECT * FROM noticias WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_assoc($resultado);
}

function atualizarNoticia($conexao, $titulo, $texto, $resumo, $imagem, $idNoticia, $idUsuario, $tipoUsuario)
{
    if ($tipoUsuario == 'admin') {
        /* Pode atualizar qualquer noticia (basta saber qual noticia)*/
        $sql = "UPDATE noticias SET 
        titulo = '$titulo',
        texto = '$texto',
        resumo = '$resumo',
        imagem = '$imagem'
        WHERE id = $idNoticia"; // PERIGO
    } else {
        /* Pode atualizar somente suas noticia (basta saber qual a noticia e usuario) */
        $sql = "UPDATE noticias SET 
        titulo = '$titulo',
        texto = '$texto',
        resumo = '$resumo',
        imagem = '$imagem'
        WHERE id = $idNoticia AND usuario_id = $idUsuario"; // PERIGO
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario)
{
    if ($tipoUsuario == 'admin') {

        // Pode apagar QUALQUER noticias sabendo o id dela
        $sql = "DELETE FROM noticias WHERE id = $idNoticia";
    } else {

        $sql = "DELETE FROM noticias WHERE id = $idNoticia AND  usuario_id";
    }

    // Pode apagar Somente as proprias noticias sabendo o id dela e do user
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}



/* Funções para as paginas publicas do Microblog:
index, noticia, resultados
*/


//index.php
function lerTodasNoticias($conexao)
{
    $sql = "SELECT titulo, imagem, resumo, id
        FROM noticias ORDER BY data DESC";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

// noticias.php
function lerNoticiaCompleta($conexao, $id)
{
    /* $sql = "SELECT 
    noticias.id,
    noticias.titulo,
    noticias.data,
    noticias.imagem,
    noticias.texto
      FROM noticias JOIN usuarios
     ON noticias.usuario_id = usuarios.id
      WHERE noticias.id = $id"; */

    $sql = "SELECT
    n.id,
    n.data,
    n.titulo,
    n.texto,
    n.imagem,
    u.nome
    FROM noticias n
     JOIN usuarios u ON n.usuario_id = u.id 
     WHERE n.id = $id"; // só esta parte que foi customizada";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_assoc($resultado);
}

// resultados.php
function busca($conexao, $termoBuscado){
    //Atenção ao uso do operador LIKE em vez de = e do operador coringa %

    //Ambos são nescessários para que a busca seja mais abrangente, permitindo que o terno esteja em qualquer lugar dentro das colunas.

    $sql = "SELECT id, data, titulo, resumo FROM noticias
    WHERE
     titulo LIKE '%$termoBuscado%' OR
     resumo LIKE '%$termoBuscado%'OR
     texto LIKE '%$termoBuscado%'
    ORDER BY data DESC";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}
