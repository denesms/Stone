<?php

require_once 'connection.php';
include 'Usuario.php';

class UsuarioDAO {

    var $conn;

    function UsuarioDAO() {
        $database = new Connection();
        $this->conn = $database->openConnection();
    }

    public function Create($usuario) {


        $sql = "INSERT INTO usuario (nome, cpf, rg, login, senha, email, telefone, cidade, estado, permissao,fotoperfil)
                    VALUES ('" . $usuario->getNome() . "', '" . $usuario->getCpf() . "','" . $usuario->getRg() . "', '" . $usuario->getlogin() . "', '" . $usuario->getSenha() . "', '" . $usuario->getEmail() . "', '" . $usuario->getTelefone() . "', '" . $usuario->getCidade() . "', '" . $usuario->getEstado() . "','" . $usuario->getPermissao() . "','" . $usuario->getFotoperfil() . "')";

        $this->conn->exec($sql);
    }



    //=========== Pesquisa todos os Campos =============================
    public function Read() {

        $sql = "select * from usuario";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $usuario = array();
        foreach ($result as $row) {
            $u = new Usuario($row['idusuario'], $row['nome'], $row['cpf'], $row['rg'], $row['login'], $row['senha'], $row['email'], $row['telefone'], $row['cidade'], $row['estado'], $row['permissao'], $row['fotoperfil']);

            array_push($usuario, $u);
        }

        return $usuario;
    }

    //=========== Pesquisa Campos do PRofessor e Administrador =============================
    public function ReadProFeADM() {

        $sql = "SELECT * FROM usuario WHERE permissao != 'Aluno'";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $usuario = array();
        foreach ($result as $row) {
            $u = new Usuario($row['idusuario'], $row['nome'], $row['cpf'], $row['rg'], $row['login'], $row['senha'], $row['email'], $row['telefone'], $row['cidade'], $row['estado'], $row['permissao'], $row['fotoperfil']);

            array_push($usuario, $u);
        }

        return $usuario;
    }

    //=========== Pesquisa por ID =========================

    public function ReadByID($id) {

        $sql = "select * from usuario WHERE idusuario = $id ";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $usuario = array();
        foreach ($result as $row) {
            $u = new Usuario($row['idusuario'], $row['nome'], $row['cpf'], $row['rg'], $row['login'], $row['senha'], $row['email'], $row['telefone'], $row['cidade'], $row['estado'], $row['permissao'], $row['fotoperfil']);
            array_push($usuario, $u);
        }
        return $usuario;
    }

    //================ UPDATE ===================

    public function Update($id, $nome, $cpf, $rg, $login, $senha, $email, $telefone, $cidade, $estado, $permissao,$fotoperfil) {
        $stmt = $this->conn->prepare('UPDATE usuario SET nome = :nome, cpf = :cpf, rg = :rg, login = :login, senha = :senha, email = :email, telefone = :telefone,cidade = :cidade , estado = :estado, permissao = :permissao, fotoperfil = :fotoperfil WHERE idusuario = :id');
        $stmt->execute(array(":id" => $id, ":nome" => $nome, ":cpf" => $cpf, ":rg" => $rg, ":login" => $login, ":senha" => $senha, ":email" => $email, ":telefone" => $telefone, ":cidade" => $cidade, ":estado" => $estado, ":permissao" => $permissao, ":fotoperfil" => $fotoperfil));
    }
//================ UPDATE FOTO PERFIL ===================

    public function UpdateFoto($id,$fotoperfil) {
        $stmt = $this->conn->prepare('UPDATE usuario SET fotoperfil = :fotoperfil WHERE idusuario = :id');
        $stmt->execute(array(":id" => $id,":fotoperfil" => $fotoperfil));
    }

    //=============== DELETE ===============

    public function Delete($id) {
        $this->conn->query("DELETE FROM usuario WHERE idusuario = '$id'");
    }

    //======================= Paginação ===========================
    public function itemPorPagina($pagina1, $qItens) {
        $pagina = intval($pagina1);
        $itens_por_pagina = $qItens;

        return $pagina;
    }

    public function numTotal($itens_por_pagina) {
        $stmt = $this->conn->prepare("SELECT * FROM usuario");
        $stmt->execute();

        $numTotal = $stmt->rowCount();
        $numPagina = ceil($numTotal / $itens_por_pagina);
        return $numPagina;
    }

    public function paginacao($pagina, $numPagina, $itens_por_pagina) {

        if ($pagina >= $numPagina) {
            $pagina = 0;
        } else if ($pagina < 0) {
            $pagina = 0;
        }
        $paginaOffset = $pagina * $itens_por_pagina;

        $result = $this->conn->query("SELECT * FROM usuario  OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $usuario = array();
        foreach ($result as $row) {
            $u = new Usuario($row['idusuario'], $row['nome'], $row['cpf'], $row['rg'], $row['login'], $row['senha'], $row['email'], $row['telefone'], $row['cidade'], $row['estado'], $row['permissao'], $row['fotoperfil']);
            array_push($usuario, $u);
        }
        return $usuario;
    }

}

?>