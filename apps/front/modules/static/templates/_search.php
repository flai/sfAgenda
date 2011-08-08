<div class="column">
  <p>
    <a class="btn" href="<?php echo url_for('newpage'); ?>" title="Crear un contacto">Nuevo contacto</a>
  </p>
  <div class="box_search">
    <p>
      Índice:
    </p>
    <table>
      <?php foreach( $letters as $key => $letter): ?>
        <?php if( $key % 4 == 0): ?>
          <tr>
        <?php endif; ?>
        <td>
          <a href="<?php echo url_for('listpage'); ?>" title="Buscando por la letra <?php echo $letter; ?>">
            <?php echo strtoupper($letter); ?>
          </a>
        </td>
        <?php if( $key % 4 == 3): ?>
          </tr>
        <?php endif; ?>
      <?php endforeach; ?>
    </table>
  </div>
</div>