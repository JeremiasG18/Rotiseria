<?php 

require_once './src/views/templates/header.php';

?>

<section>
    <h1>Crear Comida</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="food_name" placeholder="Nombre de la comida o plato" required>
        <input type="text" name="price" placeholder="Precio" required>
        <label for="food_image" id="label_form">Subir imagen</label>
        <input type="file" name="food_image" id="food_image" accept="image/png, image/jpeg">
        <?php if (isset($error)) : ?>
            <div class="error_message"><?= $error ?></div>
        <?php endif; ?>
        <input type="submit" value="Registrar comida">
    </form>
</section>

<?php 

require_once './src/views/templates/footer.php';

?>