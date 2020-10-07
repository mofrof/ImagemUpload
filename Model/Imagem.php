<?php

class Imagem{
    private $nome;
    private $imageData;
    private $imageType;

    public function __construct(String $nome, String $imageData, String $imageType )
    {
        $this->nome = $nome;
        $this->imageData = $imageData;
        $this->imageType = $imageType;
    }

    public function recuperaNome(){
        return $this->nome;
    }

    public function recuperaData(){
        return $this->imageData;
    }

    public function recuperaType(){
        return $this->imageType;
    }

    public function recuperaBase64(){
        return base64_encode($this->imageData);
    }

}