<div class="main">
    <div class="grid">
        <div class="col">
            <div>
                <div class="img">
                    <img src="https://picsum.photos/500/500" alt="">
                </div>
                <div class="controls">
                    <div class="grid">
                        <div class="col">
                            <i class="fas fa-arrow-circle-left"></i>
                        </div>
                        <div class="col">
                            <i class="fas fa-arrow-circle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div>
                <h1><?php echo $assoc->nome; ?></h1>
                <p>Telefone: <?php echo $assoc->telefone; ?></p>
                <p>Morada: <?php echo $assoc->morada; ?></p>
                <p>Nº de contribuinte: <?php echo $assoc->nContribuinte; ?></p>
            </div>
        </div>
    </div>
    <div class="grid">
        <?php if ($adm): ?>
            <div style="margin-right: 25px;"><a href="<?php echo HOME_URI . 'associacao/editar/' . $assoc->id; ?>">Editar</a></div>
            <div style="margin-right: 25px;"><a href="<?php echo HOME_URI . 'associacao/apagar/' . $assoc->id; ?>">Apagar</a></div>
            <div style="margin-right: 25px;"><a href="<?php echo HOME_URI . 'register/' . $assoc->id; ?>">Add Socio</a></div>
        <?php endif; ?>
        <?php if ($gerirEventos): ?>
            <div style="margin-right: 25px;"><a href="<?php echo HOME_URI . 'evento/criar'; ?>">Add Evento</a></div>
        <?php endif; ?>
        <?php if ($gerirNoticias): ?>
            <div style="margin-right: 25px;"><a href="<?php echo HOME_URI . 'noticia/criar'; ?>">Add noticia</a></div>
        <?php endif; ?>
        <div style="margin-right: 25px;"><a href="<?php echo HOME_URI . 'noticia/all/' . $assoc->id; ?>">Ver noticias</a></div>
        <div><a href="<?php echo HOME_URI ?>">Ver Eventos</a></div>
    </div>
    <div class="title">
        <h1>Socios</h1>
    </div>
    <div class="socio-grid">
        <?php echo $socios; ?>
    </div>
</div>