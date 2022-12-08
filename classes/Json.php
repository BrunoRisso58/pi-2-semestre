<?php

$dados = [
    'plano' => [
        [
            'id' => '1',
            'valorPlano' => '99.99',
            'tipo' => 'Avançado'
        ],
    ],
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
    ],
    'pagamento' => [
        [
            'id_pgto' => '1',
            'idPlano' => '1',
            'idCliente' => '1',
            'valor_pgto' => '99.99',
            'data_compra' => '13/03/2022'
        ],
    ],
    'perfis' => [
        [
            'id_perfil' => '1',
            'nome' => 'Bruno',
            'pontuacao' => '67'
        ]
    ]

];

$arquivo = __DIR__ . './db.json';

file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));

?>