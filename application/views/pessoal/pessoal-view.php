<div class="main">
    <div class="grid">
        <div class="col">
            <ul id="menu">
                <li>Conta</li>
                <li>Quotas</li>
                <?php if (!$superAdm): ?>
                    <li>Eventos que participou</li>
                    <li>Noticias que gostou</li>
                <?php else: ?>
                    <li>Socios</li>
                    <li>Noticias</li>
                    <li>Eventos Ativos</li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="line"></div>
        <div class="col">
            <article id="conta">
                <p>Conta</p>
                <form action="<?php echo HOME_URI;?>pessoal/edit/username" method="post">
                    <label for="">Username:</label><br />
                    <input type="text" name="username" placeholder="Username" value="<?php echo $this->userInfo->username ?? "" ?>">
                    <input type="submit" value="Guardar">
                </form>
                <form action="<?php echo HOME_URI;?>pessoal/edit/nome" method="post">
                    <label for="">Nome:</label><br />
                    <input type="text" name="nome" placeholder="Name" value="<?php echo $this->userInfo->nome ?? "" ?>">
                    <input type="submit" value="Guardar">
                </form>
                <form action="<?php echo HOME_URI;?>pessoal/edit/email" method="post">
                    <label for="">Email:</label><br />
                    <input type="text" name="email" placeholder="Email" value="<?php echo $this->userInfo->email ?? "" ?>">
                    <input type="submit" value="Guardar">
                </form>
                <form action="<?php echo HOME_URI;?>pessoal/edit/password" method="post">
                    <div class="grid">
                        <div>
                            <label for="">Password Antiga:</label><br />
                            <input type="password" name="oldPassword" placeholder="Password Antiga"><br />
                            <label for="">Nova password:</label><br />
                            <input type="password" name="password" placeholder="Nova Password">
                        </div>
                        <div class="col-btn">
                            <input type="submit" value="Guardar">
                        </div>
                    </div>
                </form>
            </article>
            <article id="noticias">
                <?php if (!$superAdm): ?>
                    <p>Noticias que gostou</p>
                <?php else: ?>
                    <p>Noticias</p>
                <?php endif; ?>
                <?php echo $noticiasHTML; ?>
                <?php if ($noticiasPaginator->show):?>
                    <div class="eventos-controls controls grid">
                        <?php if ($noticiasPaginator->hasPreviousPage): ?>
                            <div>
                                <form action="">
                                    <input type="hidden" name="page" value="<?php echo $noticiasPaginator->pageNum - 1; ?>">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </form>
                            </div>
                        <?php endif; ?>
                        <div>
                            <span><small>Pagina: <?php echo $noticiasPaginator->pageNum; ?></small></span>
                        </div>
                        <?php if ($noticiasPaginator->hasNextPage): ?>
                            <div>
                                <form action="">
                                    <input type="hidden" name="page" value="<?php echo $noticiasPaginator->pageNum + 1; ?>">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </article>
            <article id="quotas">
                <p>Quotas</p>
                <?php echo $quotasHTML; ?>
                <?php if ($quotasPaginator->show): ?>
                    <div class="controls grid">
                        <?php if ($quotasPaginator->hasPreviousPage): ?>
                            <div>
                                <form action="">
                                    <input type="hidden" name="page" value="<?php echo $quotasPaginator->pageNum - 1; ?>">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </form>
                            </div>
                        <?php endif; ?>
                        <div>
                            <span><small>Pagina: <?php echo $quotasPaginator->pageNum; ?></small></span>
                        </div>
                        <?php if ($quotasPaginator->hasNextPage): ?>
                            <div>
                                <form action="">
                                    <input type="hidden" name="page" value="<?php echo $quotasPaginator->pageNum + 1; ?>">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </article>
            <article id="eventos">
                <?php if (!$superAdm): ?>
                    <p>Eventos que participou</p>
                <?php else: ?>
                    <p>Eventos Ativos</p>
                <?php endif; ?>
                <?php echo $eventosHTML; ?>
                <?php if ($eventosPaginator->show): ?>
                    <div class="eventos-controls controls grid">
                        <?php if ($eventosPaginator->hasPreviousPage): ?>
                            <div>
                                <form action="">
                                    <input type="hidden" name="page" value="<?php echo $eventosPaginator->pageNum - 1; ?>">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </form>
                            </div>
                        <?php endif; ?>
                        <div>
                            <span><small>Pagina: <?php echo $eventosPaginator->pageNum; ?></small></span>
                        </div>
                        <?php if ($eventosPaginator->hasNextPage): ?>
                            <div>
                                <form action="">
                                    <input type="hidden" name="page" value="<?php echo $eventosPaginator->pageNum + 1; ?>">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </article>
            <?php if ($superAdm): ?>
                <article id="socios">
                    <p>Socios</p>
                    <?php echo $sociosHTML ?>
                    <?php if ($sociosPaginator->show): ?>
                        <div class="eventos-controls controls grid">
                            <?php if ($sociosPaginator->hasPreviousPage): ?>
                                <div>
                                    <form action="">
                                        <input type="hidden" name="page" value="<?php echo $sociosPaginator->pageNum - 1; ?>">
                                        <i class="fas fa-arrow-circle-left"></i>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <div>
                                <span><small>Pagina: <?php echo $sociosPaginator->pageNum; ?></small></span>
                            </div>
                            <?php if ($sociosPaginator->hasNextPage): ?>
                                <div>
                                    <form action="">
                                        <input type="hidden" name="page" value="<?php echo $sociosPaginator->pageNum + 1; ?>">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </article>
            <?php //else: ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
    //todo acabar de implementar o paginator adicionar as forms nos btns e verificar por erros etc
?>