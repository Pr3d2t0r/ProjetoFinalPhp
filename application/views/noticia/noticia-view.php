<div class="banner">
    <h1><?php echo $noticia->titulo; ?></h1>
    <p><?php echo $noticia->conteudo; ?></p>
    <img src="<?php echo $noticia->caminhoImg; ?>" alt="">
    <?php if ($adm): ?>
        <div class="grid">
            <div><a href="<?php echo HOME_URI . 'noticia/editar/' . $noticia->id; ?>">Editar</a></div>
            <div><a href="<?php echo HOME_URI . 'noticia/apagar/' . $noticia->id; ?>">Apagar</a></div>
        </div>
    <?php endif; ?>

</div>