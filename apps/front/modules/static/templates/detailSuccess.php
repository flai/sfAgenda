<h2>Detalle de un contato</h2>
<div class="box_medium">
  <p>
    <img width="300"
      src="<?php echo DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $contacto->imagen; ?>"
      alt="Fotografía de <?php echo trim( sprintf( '%s %s %s', $contacto->nombre, $contacto->primer_apellido, $contacto->segundo_apellido ) );?>" />
  </p>
</div>
<div class="box_medium_complementary">
  <p class="large_text">
    <?php echo $contacto->nombre; ?> <strong><?php echo trim( sprintf( '%s %s', $contacto->primer_apellido, $contacto->segundo_apellido ) );?></strong>
  </p>
  <?php include_partial('static/address', array('direccion' => $contacto->getDireccionPrincipal())); ?>
  <p class="right">
    <a class="btn" href="<?php echo url_for('editpage', $contacto); ?>" title="Editar el contacto">Editar información</a>
    <a class="btn" href="<?php echo url_for('deletepage', $contacto); ?>" title="Borrar el contacto">Borrar</a>
  </p>
</div>
<div class="clear"></div>
<h3>Otras direcciones</h3>
<?php foreach( $contacto->getOtrasDirecciones() as $key => $direccion ): ?>
  <div class="address">
    <div class="box_mini">
      <p>
        Dirección <?php echo $key + 1; ?>
      </p>
    </div>
    <div class="box_mini_complementary">
      <?php include_partial('static/address', array('direccion' => $direccion)); ?>
    </div>
    <div class="clear"></div>
  </div>
<?php endforeach; ?>
