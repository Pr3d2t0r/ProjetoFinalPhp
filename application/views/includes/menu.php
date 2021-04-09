<nav>
    <a href="<?php echo HOME_URI;?>" id="logo">Bleet</a>
    <ul>
        <li><a href="<?php echo HOME_URI;?>">Home</a></li>
        <?php if (!$this->isUserLogedIn()): ?>
            <li><a href="<?php echo HOME_URI;?>register/">Register</a></li>
            <li><a href="<?php echo HOME_URI;?>login/">Login</a></li>
        <?php else: ?>
            <li><a href="<?php echo HOME_URI;?>login/logout">Logout</a></li>
            <li><a href="<?php echo HOME_URI;?>login/logout/all">Logout All</a></li>
            <?php if ($this->superAdm !== true): ?>
                <li><a href="<?php echo HOME_URI.'associacao/'.$this->userInfo->associacaoId;?>"><?php echo $this->userInfo->associacaoNome; ?></a></li>
            <?php else:?>
                <li><a href="<?php echo HOME_URI;?>associacao/all">Associações</a></li>
            <?php endif;?>
            <li><a href="<?php echo HOME_URI;?>pessoal/">Pessoal</a></li>
            <li>Welcome <?php echo $this->userInfo->username; ?></li>
        <?php endif; ?>
    </ul>
</nav>