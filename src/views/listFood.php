<?php require_once './src/views/templates/header.php'; ?>

<h1>Comidas Registradas</h1>
<div class="foods">

<?php foreach ($respuesta as $value) { ?>
<div class="card-food">
    <img src="../../<?= $value['foto_url']; ?>" alt="imagen de comida">
    <div class="food_info">
        <p><?= $value['nombre'] ?></p>
        <p>$ <?= $value['precio'] ?></p>
    </div>
</div>
<?php } ?>

</div>

<?php require_once './src/views/templates/footer.php'; ?>