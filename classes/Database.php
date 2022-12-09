<?php

class Database
{

    public $dbname = '';
    public $conn;
    public $userDB = "root";
    public $password = "";

    function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=bancodedados", $this->userDB, $this->passwordDB);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Conexão falhou: " . $e->getMessage();
        }
    }

    function create()  // adicionar mais conforme as tabelas
    {
        $this->connect();
        $sql = "INSERT INTO 
        VALUES ('')";
        $this->conn->exec($sql);
        echo ""; // Mensagem de exito 
        $this->conn = null;
    }

    function selectClientes()  // adicionar mais conforme as tabelas
    {
        try {
            $this->connect();
            $sql = "SELECT * FROM cliente";
            $result = $this->conn->query($sql)->fetchAll();
            if ($result == false) {
                echo "Ainda não há nenhum cliente criado!";
            } else {
                foreach ($result as $row) {
                    $dataJson = file_get_contents('db.json');
                    $decodedDataJson = json_decode($dataJson, true);

                    $dadosCliente = [
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
                    ];

                    $newDataJson = $decodedDataJson['cliente'] . $dadosCliente;

                    $arquivo = __DIR__ . '../../db.json';
                    file_put_contents($arquivo, json_encode($newDataJSon, JSON_PRETTY_PRINT));
                }
            }
        } catch (PDOException $e) {
            echo "Não foi possível ler as informações do banco de dados.";
        };
        $this->conn = null;
    }

    function update()  // adicionar mais conforme as tabelas
    {
        // RECEBER VARIAVEIS QUE VE DO CAMPO PARA ATUALIZAR
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $etc = $_POST['etc'];
        }
        //
        $this->connect();
        $sql = "UDATE tabela SET name ='$name'";  // exemplo
        $this->conn->exec($sql);
        echo ""; // Mensagem de exito 
        $this->conn = null;
    }

    function delete()  // adicionar mais conforme as tabelas
    {
        $this->connect();
        $sql = "DELETE FROM 
        WHERE ";
        $this->conn->exec($sql);
        echo ""; // Mensagem de exito 
        $this->conn = null;
    }
}

$teste = new Database();
$teste->selectClientes();