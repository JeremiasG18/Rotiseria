<?php 

require_once './src/views/templates/header.php';

?>

<?php if ($respuesta) : ?>
    <h1>Ordenes</h1>
    <table>
        <thead>
            <tr>
                <th class="left">#</th>
                <td>Comida</td>
                <td class="right">Precio</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                $mesa = 0;
                foreach ($respuesta as $value) : 
                    if ($value['mesa'] !== $mesa) :
                        $mesa = $value['mesa'];
                        $i = 1;
            ?>
                        <tr>
                            <th class="mesa" colspan="3">Mesa <?= $value['mesa'] ?></th>
                        </tr>
                <?php endif; ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $value['nombre'] ?></td>
                    <td><?= $value['precio'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
else :
    echo 'No hay ordenes';
endif;

?>

<?php 

require_once './src/views/templates/footer.php';

?>