<?php if( count( $contactos) ): ?>
  <?php foreach( $contactos as $key =>$contacto ): ?>
    <?php include_partial( 'static/item', array('contacto' => $contacto) ); ?>
    <?php if( $key % 2 == 1): ?>
      <div class="clear"></div>
    <?php endif; ?>
  <?php endforeach;?>
<?php else: ?>
  <p>No existen elementos para esta búsqueda.</p>
<?php endif; ?>