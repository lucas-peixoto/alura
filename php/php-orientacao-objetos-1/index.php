<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require 'ContaCorrente.php';

$contaJoao = new ContaCorrente('Joao', '1212', '345565-1', 2000.0);
$contaMaria = new ContaCorrente('Maria',  '1212', '345566-1', 6000.0);

echo '<h2>Contas Correntes</h2>';

echo '<h3>' . $contaJoao . '</h3>';
echo '<h3>' . $contaMaria . '</h3>';

$contaJoao->transferir(20, $contaMaria);

echo "<pre>";
var_dump($contaJoao);
var_dump($contaMaria);
echo "</pre>";

?>
