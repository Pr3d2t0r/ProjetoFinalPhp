<div class="banner">
    <div class="grid">
        <div class="line register"></div>
        <div>
            <p>User Register</p>
            <form action="<?php echo HOME_URI; ?>register/" method="post">
                <input type="text" name="username" placeholder="Username"><br>
                <input type="text" name="nome" placeholder="Nome"><br>
                <input type="text" name="email" placeholder="Email"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <input type="password" name="rPassword" placeholder="Password repeat"><br>
                <input type="hidden" name="AssocId" value="<?php echo $assocId;?>">
                <label for="">Permissões:</label><br />
                <?php if ($superAdm): ?>
                    <label for="">Admin<input type="checkbox" name="Admin" value="1"></label>
                <?php endif; ?>
                    <label for="">Gerir noticias<input type="checkbox" name="Gerir-noticias" value="1"></label>
                    <label for="">Gerir eventos<input type="checkbox" name="Gerir-eventos" value="1"></label>
                <?php if($this->msg != null): ?>
                    <div class="msgs">
                        <p><small style="color:<?php echo ($this->msg[1] == 'success') ? 'green' : 'red';?>;"><?php echo $this->msg[0]; ?></small></p>
                    </div>
                <?php endif; ?>
                <br />
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</div>
