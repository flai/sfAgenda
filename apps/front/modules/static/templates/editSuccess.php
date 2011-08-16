<h2>Editando un contacto</h2>
<form action="<?php echo url_for('editpage', $contacto); ?>" method="POST" enctype="multipart/form-data">
  <?php include_partial('static/form', array('form' => $form)); ?>
</form>