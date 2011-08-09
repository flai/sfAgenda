<div class="box_item">
  <div class="fleft">
    <p>
      <img width="100"
        src="<?php echo DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $contacto->imagen; ?>"
        alt="Fotografía de <?php echo trim( sprintf( '%s %s %s', $contacto->nombre, $contacto->primer_apellido, $contacto->segundo_apellido ) );?>" />
    </p>
  </div>
  <div class="fleft">
    <p>
      <a href="<?php echo url_for('detailpage', $contacto); ?>" title="Detalle de un contacto">
        <?php echo $contacto->nombre; ?> <strong><?php echo trim( sprintf( '%s %s', $contacto->primer_apellido, $contacto->segundo_apellido ) );?></strong>
      </a>
    </p>
  </div>
  <div class="clear"></div>
</div>