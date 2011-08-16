<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice">
    <?php echo $sf_user->getFlash('notice'); ?>
  </div>
<?php endif; ?>
<?php if ($sf_user->hasFlash('error')): ?>
  <div class="error">
    <?php echo $sf_user->getFlash('error'); ?>
  </div>
<?php endif; ?>
<table>
  <tr>
    <td>
      <span class="small_text">Nombre:</span>
    </td>
    <td>
      <?php echo $form['nombre']->renderError(); ?>
      <?php echo $form['nombre']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <span class="small_text">Primer apellido:</span>
    </td>
    <td>
      <?php echo $form['primer_apellido']->renderError(); ?>
      <?php echo $form['primer_apellido']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <span class="small_text">Segundo apellido:</span>
    </td>
    <td>
      <?php echo $form['segundo_apellido']->renderError(); ?>
      <?php echo $form['segundo_apellido']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <span class="small_text">Imagen:</span>
    </td>
    <td>
      <?php echo $form['imagen']->renderError(); ?>
      <?php echo $form['imagen']; ?>
    </td>
  </tr>
</table> 
<h3>Direcciones</h3>
<?php foreach( $form->getEmbeddedForms() as $key1 => $aux_form ): ?>
  <?php foreach( $aux_form->getEmbeddedForms() as $key2 => $address_form ): ?>
    <?php include_partial('static/form_address', array('form' => $form, 'key1' => $key1, 'key2' => $key2)); ?>
  <?php endforeach; ?> 
<?php endforeach; ?> 
<p class="fright">
  <?php echo $form['_csrf_token']->renderError(); ?>
  <?php echo $form['_csrf_token']; ?>
  <input class="btn" type="submit" value="Guardar">
</p>
<div class="clear"></div>