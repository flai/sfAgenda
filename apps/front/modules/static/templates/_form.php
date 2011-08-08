<table>
  <tr>
    <td>
      <span class="small_text">Nombre:</span>
    </td>
    <td>
      <input type="text" />
    </td>
  </tr>
  <tr>
    <td>
      <span class="small_text">Primer apellido:</span>
    </td>
    <td>
      <input type="text" />
    </td>
  </tr>
  <tr>
    <td>
      <span class="small_text">Segundo apellido:</span>
    </td>
    <td>
      <input type="text" />
    </td>
  </tr>
  <tr>
    <td>
      <span class="small_text">Imagen:</span>
    </td>
    <td>
      <input type="file" />
    </td>
  </tr>
</table>
<h3>Direcciones</h3>
<?php for( $i = 0; $i < 2; $i++ ): ?>
  <?php include_partial('static/form_address', array('index' => $i)); ?>
<?php endfor; ?>