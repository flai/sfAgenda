<h2>Detalle de un contato</h2>
<div class="box_medium">
  <p>
    <img width="300" src="http://dummyimage.com/600x400/000/fff&amp;text=IMG" alt="Imagen del contacto" />
  </p>
</div>
<div class="box_medium_complementary">
  <p class="large_text">
    Nombre <strong>Apellido1 Apellido2</strong>
  </p>
  <?php include_partial('static/address'); ?>
  <p class="right">
    <a class="btn" href="<?php echo url_for('editpage'); ?>" title="Editar el contacto">Editar información</a>
    <a class="btn" href="<?php echo url_for('deletepage'); ?>" title="Borrar el contacto">Borrar</a>
  </p>
</div>
<div class="clear"></div>
<h3>Otras direcciones</h3>
<?php for( $i = 0 ; $i < 2; $i++): ?>
  <div class="address">
    <div class="box_mini">
      <p>
        Dirección <?php echo $i + 1; ?>
      </p>
    </div>
    <div class="box_mini_complementary">
      <?php include_partial('static/address'); ?>
    </div>
    <div class="clear"></div>
  </div>
<?php endfor; ?>
