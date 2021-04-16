<div class="banner">
    <p>Editar Associação</p><br />
    <form action="<?php echo HOME_URI . 'associacao/editar/' . ($id ?? '');?>" method="post" enctype="multipart/form-data">
        <input type="text" name="nome" placeholder="Nome da associação!" value="<?php echo $nome ?? ''; ?>"><br /><br />
        <input type="text" name="morada" placeholder="Morada da associação!" value="<?php echo $morada ?? ''; ?>"><br /><br />
        <input type="text" name="nTelefone" placeholder="Telefone da associação!" value="<?php echo $telefone ?? ''; ?>"><br /><br />
        <input type="text" name="nContribuinte" placeholder="Numero de contribuinte!" value="<?php echo $nContribuinte ?? ''; ?>"><br /><br />
        <input type="file" multiple="multiple" name="imgs[]"><br /><br />
        <input type="submit" value="Guardar">
    </form>
</div>