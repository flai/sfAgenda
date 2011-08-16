<h2>Nuevo contacto</h2>
<form action="<?php echo url_for('newpage'); ?>" method="post" enctype="multipart/form-data">
  <?php include_partial('static/form', array('form' => $form)); ?>
</form>