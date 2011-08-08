<h2>Los + consultados</h2>
<?php foreach( $contactos as $key =>$contacto ): ?>
  <?php include_partial( 'static/item', array('contacto' => $contacto) ); ?>
  <?php if( $key % 2 == 1): ?>
    <div class="clear"></div>
  <?php endif; ?>
<?php endforeach;?>