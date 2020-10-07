<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ListaImagens</h1>
    <?php
    foreach($listaImagens as $imagem){
        echo '<img src="data:image/jpeg;base64,' . $imagem->recuperaBase64() . '" />';
    }
?>

</body>

</html>