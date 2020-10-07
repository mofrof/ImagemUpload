<?php

require_once(__DIR__ . '/../Model/Imagem.php');
require_once(__DIR__ . '/../Model/ImagemBanco.php');
require_once(__DIR__ . '/../Model/Conexao.php');


$imgData = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
$imgType = getimageSize($_FILES['fileToUpload']['tmp_name']);

$imagem = new Imagem($_FILES['fileToUpload']['name'], $imgData,$imgType['mime']);

$imagemBanco = new ImagemBanco();

if ($imagemBanco->inserirImagem($imagem)) {
    //$imagemRecuperadaDoBanco = $imagemBanco->buscarImagem($imagem->recuperaNome());
    $listaImagens = $imagemBanco->buscarImagens();
    require_once(__DIR__."/../View/exibirImagem.php");
} else {
    echo '<h1>NÃO-Inserido</h1>';
}
