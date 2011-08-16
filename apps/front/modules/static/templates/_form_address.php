<div class="address">
  <div class="box_mini">
    <p>
      Dirección <?php echo $key2; ?>
    </p>
  </div>
  <div class="box_mini_complementary">
    <table>
      <tr>
        <td>
          <span class="small_text">Dirección:</span>
        </td>
        <td>
          <?php echo $form[$key1][$key2]['direccion']->renderError(); ?>
          <?php echo $form[$key1][$key2]['direccion']; ?>
        </td>
      </tr>
      <tr>
        <td>
          <span class="small_text">¿Predeterminada?:</span>
        </td>
        <td>
          <?php echo $form[$key1][$key2]['predeterminado']->renderError(); ?>
          <?php echo $form[$key1][$key2]['predeterminado']; ?>
        </td>
      </tr>
      <tr>
        <td>
          <span class="small_text">Correo electrónico:</span>
        </td>
        <td>
          <?php echo $form[$key1][$key2]['email']->renderError(); ?>
          <?php echo $form[$key1][$key2]['email']; ?>
        </td>
      </tr>
      <tr>
        <td>
          <span class="small_text">Teléfono:</span>
        </td>
        <td>
          <?php echo $form[$key1][$key2]['telefono']->renderError(); ?>
          <?php echo $form[$key1][$key2]['telefono']; ?>
        </td>
      </tr>
      <tr>
        <td>
          <span class="small_text">Otra información:</span>
        </td>
        <td>
          <?php echo $form[$key1][$key2]['info_adicional']->renderError(); ?>
          <?php echo $form[$key1][$key2]['info_adicional']; ?>
        </td>
      </tr>
    </table>
  </div>
  <div class="clear"></div>
</div>