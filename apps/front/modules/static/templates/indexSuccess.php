<h2>Los + consultados</h2>
<?php for($i = 0; $i < 6; $i++): ?>
  <?php include_partial('static/item'); ?>
  <?php if( $i % 2 == 1): ?>
    <div class="clear"></div>
  <?php endif; ?>
<?php endfor;?>