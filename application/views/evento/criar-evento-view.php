<div class="banner">
    <div class="grid">
        <div class="line"></div>
        <div>
            <p>Novo Evento</p>
            <form action="" method="post">
                <input type="text" name="titulo" placeholder="Titulo"><br>
                <textarea placeholder="Conteudo" name="conteudo"></textarea><br>
                <?php if ($nextPage != null): ?>
                    <input type="hidden" name="nextPage" value="<?php echo $nextPage; ?>">
                <?php endif; ?>
                <?php if($this->msg != null): ?>
                    <div class="msgs">
                        <p><small style="color:<?php echo ($this->msg[1] == 'success') ? 'green' : 'red';?>;"><?php echo $this->msg[0]; ?></small></p>
                    </div>
                <?php endif; ?>
                <input type="submit" value="Criar evento">
            </form>
        </div>
    </div>
</div>