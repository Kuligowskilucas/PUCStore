<?php

class DB
{
    private string $server = "localhost";
    private string $user = "root";
    private string $password = "";
    private string $db = "bancopucstore";

    public function connect()
    {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);

        if (!$conn) {
            die("Falha de conexão: " . mysqli_connect_error());
        }
    }

    
}
