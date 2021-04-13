<div class="banner">
    <h1><?php echo $titulo ?? '';?></h1>
    <p><?php echo $conteudo ?? '';?></p>
    <p>Data <?php echo $data ?? '';?></p>
    <a href="#" style="color: #1cc8a0" onclick="submit('#participar<?php echo $id; ?>')">Participar</a>
    <form id="participar<?php echo $id; ?>" action="<?php echo HOME_URI . 'evento/participar'; ?>" method="post">
        <input type="hidden" name="eventoId" value="<?php echo $id; ?>">
    </form>
</div>