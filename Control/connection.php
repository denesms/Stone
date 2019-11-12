<?php

Class Connection {

    private $server = "pgsql:host=localhost dbname=dbPCO";
    private $user = "postgres";
    private $pass = "123";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $con;

    public function openConnection() {

        try {

            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);

            return $this->con;
        } catch (PDOException $e) {

            echo "ERRO NA CONEXÃO" . $e->getMessage();
        }
    }

    public function closeConnection() {

        $this->con = null;
    }

}

?>