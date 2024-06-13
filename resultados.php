<?php
require "inc/cabecalho.php"; 
require_once "inc/funcoes-noticias.php";

//Capturando via URL/GET o que foi digitado no campo busca
$termoBuscado = mysqli_real_escape_string($conexao, htmlspecialchars($_GET['busca']));

//Executar função de busca
$dadosDaBusca = busca($conexao, $termoBuscado);
?>



<div class="row bg-white rounded shadow my-1 py-4">
    <h2 class="col-12 fw-light">
        Você procurou por <span class="badge bg-dark"><?=$termoBuscado?></span> e
        obteve <span class="badge bg-info"><?=count($dadosDaBusca)?></span> resultados
    </h2>
    
    <?php foreach ($dadosDaBusca as $noticias) {?>
    <div class="col-12 my-1">
        <article class="card">
            <div class="card-body">
                <h3 class="fs-4 card-title fw-light"><?=$noticias['titulo']?></h3>
                <p class="card-text">
                    <time><?=formataData($noticias['titulo'])?></time> - 
                    <?=$noticias['resumo']?>
                </p>
                
                <a href="noticia.php?id=<?=$noticias['id']?>" class="btn btn-primary btn-sm">Continuar lendo</a>
            </div>
        </article>
    </div>

    <?php }  ?> 
    


</div>     

<?php 
require_once "inc/rodape.php";
?>

