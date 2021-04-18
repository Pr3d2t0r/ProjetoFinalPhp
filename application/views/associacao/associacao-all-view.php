<div class="main">
    <div class="title">
        <h1>Associações</h1>
    </div>
    <div class="filter">
        <form action="" method="get">
            <input type="text" name="q" onchange="fParentSubmit(this)" placeholder="Pesquise..." value="<?php echo $q ?? ''?>">
        </form>
    </div>
    <div class="socio-grid">
        <?php echo $assocs; ?>
    </div>
</div>