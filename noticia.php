<?php
require_once "inc/cabecalho.php";
require_once "inc/funcoes-noticias.php";

/* Aplicamos uma conversão/casting forçada para valor inteiro, portanto se não for um numero valido/existente, o comando não executado e os erros não expoem os detalhes do banco/função/comendo. */
$id = (int)$_GET['id'];
$dadosNoticia = lerNoticiaCompleta($conexao, $id);

?>



<div class="row my-1 mx-md-n1">

    <article class="col-12">
        <h2><?=$dadosNoticia['titulo']?></h2>
        <p class="font-weight-light">
            <time><?=formataData($dadosNoticia['data'])?></time> - <span><?=$dadosNoticia['nome']?></span>
        </p>
        <img src="imagens/<?=$dadosNoticia['imagem']?>" alt="" class="float-start pe-2 img-fluid">
        <p class="ajusta-texto"><?=$dadosNoticia['texto']?></p>
    </article>
    

</div>        

<?php 
require_once "inc/rodape.php";
?>

