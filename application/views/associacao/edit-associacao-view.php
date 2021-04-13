<div class="banner">
    <p>Criar Associação</p><br />
    <form action="<?php echo HOME_URI . 'associacao/editar/'?>" method="post" enctype="multipart/form-data">
        <input type="text" name="nome" placeholder="Nome da associação!" value="<?php ?>"><br /><br />
        <input type="text" name="morada" placeholder="Morada da associação!" value="<?php ?>"><br /><br />
        <input type="text" name="nTelefone" placeholder="Telefone da associação!" value="<?php ?>"><br /><br />
        <input type="text" name="nContribuinte" placeholder="Numero de contribuinte!" value="<?php ?>"><br /><br />
        <input type="file" multiple="multiple" name="imgs[]"><br /><br />
        <input type="submit" value="Criar">
    </form>
</div>