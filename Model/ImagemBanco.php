<?php
require_once(__DIR__ . "/Conexao.php");
require_once(__DIR__ . "/Imagem.php");

class ImagemBanco
{
    private $BD;

    public function __construct()
    {
        $this->BD = new Conexao();
    }

    public function inserirImagem(Imagem $imagem): bool
    {
        $this->BD->abrirConnexao();

        $nome = $imagem->recuperaNome();
        $imageData = $imagem->recuperaData();
        $imageType = $imagem->recuperaType();

        $sql = "INSERT INTO imagem (nome, imageData, imageType)
         VALUES ('$nome', '$imageData','$imageType')";

        $resultado = $this->BD->recuperaConnexao()->query($sql);
        $this->BD->fecharConnexao();

        return $resultado;
    }

    public function buscarImagem(string $nomeImagem): Imagem
    {
        $this->BD->abrirConnexao();

        $query = "select nome, imageData, imageType from imagem where nome = '$nomeImagem'";
        $resultado = mysqli_query($this->BD->recuperaConnexao(), $query);
        $imagem = mysqli_fetch_assoc($resultado);
        $this->BD->fecharConnexao();

        return new Imagem($imagem['nome'], $imagem['imageData'],  $imagem['imageType']);
    }

    public function buscarImagens()
    {
        $this->BD->abrirConnexao();

        $query = "select nome, imageData, imageType from imagem";
        $resultado = mysqli_query($this->BD->recuperaConnexao(), $query);
        $listaDataImagem = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        $listaDeImagem = [];

        foreach ($listaDataImagem as $imagem) {
            $listaDeImagem[] = new Imagem($imagem['nome'], $imagem['imageData'],  $imagem['imageType']);
        }

        $this->BD->fecharConnexao();
        return $listaDeImagem;
    }
}
