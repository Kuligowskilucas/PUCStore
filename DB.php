<?php

namespace App;

class DB
{
    private string $server = "localhost";
    private string $user = "root";
    private string $password = "";
    private string $db = "bancopucstore";
    private $conn;

    public function connect()
    {
        $this->conn = new \mysqli($this->server, $this->user, $this->password, $this->db);

        if ($this->conn->connect_error) {
            die("Falha de conexão: " . $this->conn->connect_error);
        }

        return $this->conn; 
    }
    public function databaseOperations($sql)
    {
        $conn = $this->connect();
        if ($conn->query($sql)) {
            echo "Operação bem-sucedida!";
        } else {
            echo "Erro ao executar a operação: " . $conn->error;
        }
        $conn->close();
    }

    public function preparedQuery($query, $types, $params)
    {
        $conn = $this->connect();

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param($types, ...$params);

            if ($stmt->execute()) {
                echo "Operação bem-sucedida!";
            } else {
                echo "Erro ao executar a consulta: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $conn->error;
        }

        $conn->close(); 
    }
}
