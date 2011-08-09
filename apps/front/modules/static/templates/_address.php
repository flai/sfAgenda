<?php if( $direccion ): ?>
  <table>
    <tr>
      <td>
        <span class="small_text">Correo electrónico:</span>
      </td>
      <td>
        <?php echo $direccion->email; ?>
      </td>
    </tr>
    <tr>
      <td>
        <span class="small_text">Dirección:</span>
      </td>
      <td>
        <?php echo $direccion->direccion; ?>
      </td>
    </tr>
    <tr>
      <td>
        <span class="small_text">Teléfono:</span>
      </td>
      <td>
        <?php echo $direccion->telefono; ?>
      </td>
    </tr>
    <tr>
      <td>
        <span class="small_text">Otra información:</span>
      </td>
      <td>
        <?php echo $direccion->info_adicional; ?>
      </td>
    </tr>
  </table>
<?php endif; ?>