<?php if($this->msg != null): ?>
    <div class="msgs">
        <p><small style="color:<?php echo ($this->msg[1] == 'success') ? 'green' : 'red';?>;"><?php echo $this->msg[0]; ?></small></p>
    </div>
<?php endif; ?>
<p style="text-align: center; font-size: 40px">Eventos</p>
<div class="event-grid">
    <?php echo $eventosHTML; ?>
</div>
