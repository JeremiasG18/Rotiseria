<?php 

require_once './src/views/templates/header.php';

?>

<?php 
if ($respuesta) {
?>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Comida</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $mesa_repetida = '';
            $i = 1;
            foreach ($respuesta as $value) :
                $mesa = $value['mesa'];
                if ( $mesa_repetida != $mesa ) :
                    $mesa_repetida = $mesa;
                    $i = 1;
            ?>
            <tr>
                <th colspan="3">Mesa <?= $value['mesa'] ?></th>
                <?php endif; ?>
            </tr>
            <tr>
                
                <td><?= $i++ ?></td>
                <td><?= $value['nombre'] ?></td>
                <td>$ <?= $value['precio'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php
} else {
    echo 'No hay ordenes';
}
require_once './src/views/templates/footer.php';

?>