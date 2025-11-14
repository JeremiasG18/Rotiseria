<?php 

require_once './src/views/templates/header.php';

?>

<?php 

if ($respuesta) {
    echo 'Hay ordenes';
}else{
    echo 'No hay ordenes';
}

?>

<?php 

require_once './src/views/templates/footer.php';

?>