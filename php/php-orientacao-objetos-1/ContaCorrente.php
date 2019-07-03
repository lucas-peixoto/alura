<?php
require_once 'Validacao.php';

class ContaCorrente
{
    private $titular;
    private $agencia;
    private $numero;
    private $saldo;

    public function __construct($titular, $agencia, $numero, $saldo)
    {
        Validacao::verificaNumerico($saldo);

        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;
    }

    public function sacar($valor)
    {
        Validacao::verificaNumerico($valor);
        $this->saldo -= $valor;

        return $this;
    }

    public function depositar($valor)
    {
        Validacao::verificaNumerico($valor);
        $this->saldo += $valor;

        return $this;
    }

    public function __get($atributo)
    {
        Validacao::protegeAtributo($atributo);
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        Validacao::protegeAtributo($atributo);
        $this->$atributo = $valor;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    private function formataSaldo()
    {
        return 'R$ ' . number_format($this->saldo, 2, ',', '.');
    }

    public function transferir($valor, ContaCorrente $contaCorrente)
    {
        Validacao::verificaNumerico($valor);

        $this->sacar($valor);
        $contaCorrente->depositar($valor);

        return $this;
    }

    public function __toString()
    {
        return "O titular " . $this->titular . " possui " . $this->formataSaldo();
    }
}
