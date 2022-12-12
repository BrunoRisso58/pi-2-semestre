<?php

class Database
{

    public $dbname = "forall";
    public $conn;
    public $userDB = "root";
    public $passwordDB = "";

    function connect() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->userDB, $this->passwordDB);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Conexão falhou: " . $e->getMessage();
        }
    }

    function readCliente() {
        try {
            $this->connect();
            $sql = "SELECT * FROM cliente";
            $result = $this->conn->query($sql)->fetchAll();
            if ($result == false) {
                echo "Ainda não há nenhum cliente criado!";
                $dataJson = file_get_contents('../db/db.json');
                $decodedDataJson = json_decode($dataJson, true);

                $newDataJson = [
                    'plano' => [
                        ...$decodedDataJson['plano']
                    ],
                    'cliente' => [
                        ...$decodedDataJson['cliente']
                    ],
                    'pagamento' => [
                        ...$decodedDataJson['pagamento']
                    ],
                    'perfis' => []
                ];

                $arquivo = __DIR__ . '/../db/db.json';
                file_put_contents($arquivo, "");
                file_put_contents($arquivo, json_encode($newDataJson, JSON_PRETTY_PRINT));
            } else {
                $dataJson = file_get_contents('../db/db.json');
                $decodedDataJson = json_decode($dataJson, true);
                foreach ($result as $index => $row) {
                    unset($result[$index][0]);
                    unset($result[$index][1]);
                    unset($result[$index][2]);
                    unset($result[$index][3]);
                    unset($result[$index][4]);
                    unset($result[$index][5]);
                    unset($result[$index][6]);
                    unset($result[$index][7]);
                }

                $newDataJson = [
                    'plano' => [
                        ...$decodedDataJson['plano']
                    ],
                    'cliente' => [
                        ...$result
                    ],
                    'pagamento' => [
                        ...$decodedDataJson['pagamento']
                    ],
                    'perfis' => [
                        ...$decodedDataJson['perfis']
                    ]
                ];

                $arquivo = __DIR__ . '/../db/db.json';
                file_put_contents($arquivo, "");
                file_put_contents($arquivo, json_encode($newDataJson, JSON_PRETTY_PRINT));
            }
        } catch (PDOException $e) {
            echo "Error: $e";
        };
        $this->conn = null;
    }

    function createCliente($idPlano, $nome, $cpf, $idade, $telefone, $email, $senha) {
        try {
            $this->connect();
            $encodedSenha = sha1($senha);
            $sql = "INSERT INTO cliente (idPlano, nome, cpf, idade, telefone, email, senha) VALUES ($idPlano, '$nome', $cpf, $idade, $telefone, '$email', '$encodedSenha');";
            $this->conn->exec($sql);
            $this->readCliente();
        } catch (PDOException $e) {
            echo "Error: $e";
        };
        $this->conn = null;
    }

    function readPerfil() {
        $this->connect();
        $sql = "SELECT * FROM perfil";
        $result = $this->conn->query($sql)->fetchAll();
        if ($result == false) {
            echo "Ainda não há nenhum perfil criado!";
            $dataJson = file_get_contents('../db/db.json');
            $decodedDataJson = json_decode($dataJson, true);

            $newDataJson = [
                'plano' => [
                    ...$decodedDataJson['plano']
                ],
                'cliente' => [
                    ...$decodedDataJson['cliente']
                ],
                'pagamento' => [
                    ...$decodedDataJson['pagamento']
                ],
                'perfis' => []
            ];

            $arquivo = __DIR__ . '/../db/db.json';
            file_put_contents($arquivo, "");
            file_put_contents($arquivo, json_encode($newDataJson, JSON_PRETTY_PRINT));
        } else {
            $dataJson = file_get_contents('../db/db.json');
            $decodedDataJson = json_decode($dataJson, true);
            foreach ($result as $index => $row) {
                unset($result[$index][0]);
                unset($result[$index][1]);
                unset($result[$index][2]);
                unset($result[$index][3]);
                unset($result[$index][4]);
                unset($result[$index][5]);
                unset($result[$index][6]);
                unset($result[$index][7]);
            }

            $newDataJson = [
                'plano' => [
                    ...$decodedDataJson['plano']
                ],
                'cliente' => [
                    ...$decodedDataJson['cliente']
                ],
                'pagamento' => [
                    ...$decodedDataJson['pagamento']
                ],
                'perfis' => [
                    ...$result
                ]
            ];

            $arquivo = __DIR__ . '/../db/db.json';
            file_put_contents($arquivo, "");
            file_put_contents($arquivo, json_encode($newDataJson, JSON_PRETTY_PRINT));
        }
    }

    function createPerfil($idCliente, $nome, $pontuacao = 0) {
        try {
            $this->connect();
            $sql = "INSERT INTO perfis (id_cliente, nome, pontuacao) VALUES ($idCliente, '$nome', $pontuacao);";
            $this->conn->exec($sql);
        } catch (PDOException $e) {
            echo "Error: $e";
        };
        $this->conn = null;
    }

    function readPagamento() {
        try {
            $this->connect();
            $sql = "SELECT * FROM pagamento";
            $result = $this->conn->query($sql)->fetchAll();
            if ($result == false) {
                echo "Ainda não há nenhum pagamento criado!";

                $dataJson = file_get_contents('../db/db.json');
                $decodedDataJson = json_decode($dataJson, true);

                $newDataJson = [
                    'plano' => [
                        ...$decodedDataJson['plano']
                    ],
                    'cliente' => [
                        ...$decodedDataJson['cliente']
                    ],
                    'pagamento' => [],
                    'perfis' => [
                        ...$decodedDataJson['perfis']
                    ]
                ];

                $arquivo = __DIR__ . '/../db/db.json';
                file_put_contents($arquivo, "");
                file_put_contents($arquivo, json_encode($newDataJson, JSON_PRETTY_PRINT));
            } else {
                $dataJson = file_get_contents('../db/db.json');
                $decodedDataJson = json_decode($dataJson, true);
                foreach ($result as $index => $row) {
                    unset($result[$index][0]);
                    unset($result[$index][1]);
                    unset($result[$index][2]);
                    unset($result[$index][3]);
                    unset($result[$index][4]);
                    unset($result[$index][5]);
                    unset($result[$index][6]);
                    unset($result[$index][7]);
                }

                $newDataJson = [
                    'plano' => [
                        ...$decodedDataJson['plano']
                    ],
                    'cliente' => [
                        ...$decodedDataJson['cliente']
                    ],
                    'pagamento' => [
                        ...$result
                    ],
                    'perfis' => [
                        ...$decodedDataJson['perfis']
                    ]
                ];

                $arquivo = __DIR__ . '/../db/db.json';
                file_put_contents($arquivo, "");
                file_put_contents($arquivo, json_encode($newDataJson, JSON_PRETTY_PRINT));
            }
        } catch (PDOException $e) {
            echo "Error: $e";
        };
        $this->conn = null;
    }

    function readPlano() {
        try {
            $this->connect();
            $sql = "SELECT * FROM plano";
            $result = $this->conn->query($sql)->fetchAll();
            if ($result == false) {
                echo "Ainda não há nenhum plano criado!";
                $dataJson = file_get_contents('../db/db.json');
                $decodedDataJson = json_decode($dataJson, true);
                foreach ($result as $index => $row) {
                    unset($result[$index][0]);
                    unset($result[$index][1]);
                    unset($result[$index][2]);
                    unset($result[$index][3]);
                    unset($result[$index][4]);
                    unset($result[$index][5]);
                    unset($result[$index][6]);
                    unset($result[$index][7]);
                }

                $newDataJson = [
                    'plano' => [],
                    'cliente' => [
                        ...$decodedDataJson['cliente']
                    ],
                    'pagamento' => [
                        ...$decodedDataJson['pagamento']
                    ],
                    'perfis' => [
                        ...$decodedDataJson['perfis']
                    ]
                ];

                $arquivo = __DIR__ . '/../db/db.json';
                file_put_contents($arquivo, "");
                file_put_contents($arquivo, json_encode($newDataJson, JSON_PRETTY_PRINT));
            } else {
                $dataJson = file_get_contents('../db/db.json');
                $decodedDataJson = json_decode($dataJson, true);
                foreach ($result as $index => $row) {
                    unset($result[$index][0]);
                    unset($result[$index][1]);
                    unset($result[$index][2]);
                    unset($result[$index][3]);
                    unset($result[$index][4]);
                    unset($result[$index][5]);
                    unset($result[$index][6]);
                    unset($result[$index][7]);
                }

                $newDataJson = [
                    'plano' => [
                        ...$result
                    ],
                    'cliente' => [
                        ...$decodedDataJson['cliente']
                    ],
                    'pagamento' => [
                        ...$decodedDataJson['pagamento']
                    ],
                    'perfis' => [
                        ...$decodedDataJson['perfis']
                    ]
                ];

                $arquivo = __DIR__ . '/../db/db.json';
                file_put_contents($arquivo, "");
                file_put_contents($arquivo, json_encode($newDataJson, JSON_PRETTY_PRINT));
            }
        } catch (PDOException $e) {
            echo "Error: $e";
        };
        $this->conn = null;
    }
}

$db = new Database();
$db->readPerfil();