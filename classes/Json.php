<?php

$dados = [
    'cliente' => [
        [
            'id' => '1',
            'idPlano' => '1',
            'nome' => 'Vitor',
            'CPF' => '15218229824',
            'idade' => '18',
            'telefone' => '19998526524',
            'email' => 'senha'
        ],
        
    ]

];

$arquivo = __DIR__ . '/arquivo.json';

file_put_contents($arquivo, json_encode($dados));

?>