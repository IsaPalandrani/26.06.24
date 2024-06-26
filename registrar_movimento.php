<?php

require_once('./conectorMySQL.php');

$nome_peca = $_GET['nome_peca'];
$cor_peca = $_GET['cor_peca'];
$coluna = $_GET['coluna'];
$linha = $_GET['linha'];

//echo '$nome_peca: ' .$nome_peca."<br/>";
//echo '$cor_peca: ' .$cor_peca."<br/>";
//echo '$coluna: ' .$coluna."<br/>";
//echo '$linha: ' .$linha."<br/>";

$tbl_movimentos = "tbl_movimentos";
$sql_verificar_tabela = "show tables like '$tbl_movimentos';";
$tabela = $conexao->query($sql_verificar_tabela);

if($tabela->num_rows < 1){
    require_once('./criar_tbl_movimentos.php');

}

$str_sql_registrar_movimento = "
insert into `$tbl_movimentos`(
    `nome_peca`,
    `cor_peca`,
    `coluna`,
    `linha`
) values (
    `$nome_peca`,
    `$cor`,
    `$coluna`,
    `$linha`,
);";

if ($conexao->query($str_sql_registrar_movimento) === TRUE){
    $last_id = $conexao->insert_id;
    echo "Movimento $last_id registrado com sucesso.";
}
?>