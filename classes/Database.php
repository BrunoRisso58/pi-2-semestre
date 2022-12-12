<?php

class Database
{

    public $dbname = '';
    public $conn;
    public $userDB = "root";
    public $passwordDB = "";

    function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=bancodedados", $this->userDB, $this->passwordDB);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Conexão falhou: " . $e->getMessage();
        }
    }

    function createReadCliente($idPlano, $nome, $cpf, $idade, $telefone, $email, $senha) {
        try {
            $this->connect();
            $sql = "INSERT INTO cliente (idPlano, nome, cpf, idade, telefone, email, senha) VALUES ($idPlano, '$nome', $cpf, $idade, $telefone, '$email', '$senha');";
            $this->conn->exec($sql);
            $sql = "SELECT * FROM cliente";
            $result = $this->conn->query($sql)->fetchAll();
            if ($result == false) {
                echo "Ainda não há nenhum cliente criado!";
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

    function createReadPerfil($idCliente, $nome, $pontuacao = 0) {
        try {
            $this->connect();
            $sql = "INSERT INTO perfis (id_cliente, nome, pontuacao) VALUES ($idCliente, '$nome', $pontuacao);";
            $this->conn->exec($sql);
            $sql = "SELECT * FROM perfis";
            $result = $this->conn->query($sql)->fetchAll();
            if ($result == false) {
                echo "Ainda não há nenhum perfil criado!";
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
$db->readPlano();