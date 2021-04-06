<div class="main">
    <div class="grid">
        <div class="col">
            <ul id="menu">
                <li>Conta</li>
                <li>Quotas</li>
                <li>Eventos que participou</li>
                <li>Noticias que gostou</li>
            </ul>
        </div>
        <div class="line">
        </div>
        <div class="col">
            <article id="conta">
                <p>Conta</p>
                <form action="">
                    <input type="hidden" name="editConta">
                    <label for="">Username:</label><br />
                    <input type="text" name="username" placeholder="Username" value="<?php echo $this->userInfo->username ?? "" ?>">
                    <input type="submit" value="Guardar">
                </form>
                <form action="">
                    <input type="hidden" name="editConta">
                    <label for="">Nome:</label><br />
                    <input type="text" name="name" placeholder="Name" value="<?php echo $this->userInfo->nome ?? "" ?>">
                    <input type="submit" value="Guardar">
                </form>
                <form action="">
                    <input type="hidden" name="editConta">
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
                <form action="">
                    <input type="hidden" name="editConta">

                </form>
            </article>
            <article id="quotas">
                <p>Quotas</p>
                <div class="grid quota-card">
                    <div class="info">
                        <p>Data de começo: 12/04/2021</p>
                        <p>Data de termino: 16/04/2021</p>
                        <p>Preço: 120€</p>
                    </div>
                    <div class="action">
                        <form action="">
                            <input type="hidden" name="pagarQuota" value="id">
                            <input type="submit" value="Pagar">
                        </form>
                    </div>
                </div>
                <div class="grid quota-card">
                    <div class="info">
                        <p>Data de começo: 12/04/2021</p>
                        <p>Data de termino: 16/04/2021</p>
                        <p>Preço: 120€</p>
                    </div>
                    <div class="action">
                        <form action="">
                            <input type="hidden" name="pagarQuota" value="id">
                            <input type="submit" value="Pagar">
                        </form>
                    </div>
                </div>
                <div class="grid quota-card">
                    <div class="info">
                        <p>Data de começo: 12/04/2021</p>
                        <p>Data de termino: 16/04/2021</p>
                        <p>Preço: 120€</p>
                    </div>
                    <div class="action">
                        <form action="">
                            <input type="hidden" name="pagarQuota" value="id">
                            <input type="submit" value="Pagar">
                        </form>
                    </div>
                </div>
                <div class="controls grid">
                    <div>
                        <i class="fas fa-arrow-circle-left"></i>
                    </div>
                    <div>
                        <i class="fas fa-arrow-circle-right"></i>
                    </div>
                </div>
            </article>
            <article id="eventos">
                <p>Eventos que participou</p>
                <div class="evento-card">
                    <p>Titulo</p>
                    <p>mc jdslx,mcsd,fnmlksd,mclkdsnvjnfddjvndjknvjfdnbjldnjlngjlv nlsfnlksdnfd kles nklsnd jnsjdgn lsdnglksdng lnsnldn lsdngjls gjlsdng ljdsngldns</p>
                </div>
                <div class="evento-card">
                    <p>Titulo</p>
                    <p>mc jdslx,mcsd,fnmlksd,mclkdsnvjnfddjvndjknvjfdnbjldnjlngjlv nlsfnlksdnfd kles nklsnd jnsjdgn lsdnglksdng lnsnldn lsdngjls gjlsdng ljdsngldns</p>
                </div>
                <div class="eventos-controls controls grid">
                    <div>
                        <i class="fas fa-arrow-circle-left"></i>
                    </div>
                    <div>
                        <i class="fas fa-arrow-circle-right"></i>
                    </div>
                </div>
            </article>
            <article id="noticias">
                <p>Noticias que gostou</p>
                <div class="evento-card">
                    <p>Titulo</p>
                    <p>mc jdslx,mcsd,fnmlksd,mclkdsnvjnfddjvndjknvjfdnbjldnjlngjlv nlsfnlksdnfd kles nklsnd jnsjdgn lsdnglksdng lnsnldn lsdngjls gjlsdng ljdsngldns</p>
                </div>
                <div class="evento-card">
                    <p>Titulo</p>
                    <p>mc jdslx,mcsd,fnmlksd,mclkdsnvjnfddjvndjknvjfdnbjldnjlngjlv nlsfnlksdnfd kles nklsnd jnsjdgn lsdnglksdng lnsnldn lsdngjls gjlsdng ljdsngldns</p>
                </div>
                <div class="eventos-controls controls grid">
                    <div>
                        <i class="fas fa-arrow-circle-left"></i>
                    </div>
                    <div>
                        <i class="fas fa-arrow-circle-right"></i>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
<script src="<?php echo HOME_URI . 'public/static/js/pessoal.js';?>"></script>