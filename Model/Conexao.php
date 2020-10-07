<?php
class Conexao
{
    private const host = '127.0.0.1'; //('Host', '127.0.0.1');
    private const usuario = 'Biblioteca'; //('usuario', 'Biblioteca');
    private const senha = 'QDfZtOslAcvEmKgG'; //('senha', 'QDfZtOslAcvEmKgG');
    private const db = 'biblioteca'; //('db', 'biblioteca');
    private $conexao;

    public function abrirConnexao(){
        $this->conexao = mysqli_connect(self::host, self::usuario, self::senha, self::db) or die('Não foi possível concetar.');
    }

    public function fecharConnexao(){
        $this->conexao->close();
    }

    public function recuperaConnexao(){
        return $this->conexao;
    }
}
