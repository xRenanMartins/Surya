<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 30/08/2019
 * Time: 22:48
 */

require_once "Conexao.php";

class UsuarioDao
{
    public $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function cadastrar($values)
    {
        $sql = "INSERT INTO usuario (nome, email, telefone, acesso, senha, estado, cidade) VALUES ({$values})";

        return mysqli_query($this->conexao->getCon(), $sql);
    }

    public function alterar($sql)
    {
        return mysqli_query($this->conexao->getCon(), $sql);
    }

    public function listar()
    {
        $sql = "SELECT * FROM usuario";
        $executa = mysqli_query($this->conexao->getCon(), $sql);


        if (mysqli_num_rows($executa) > 0) {
            while ($row = mysqli_fetch_assoc($executa)) {
                $return[] = $row;
            }
            return $return;
        } else {
            return false;
        }
    }

    public function procuraId($id)
    {
        $sql = "SELECT * FROM usuario WHERE id='$id'";
        $executa = mysqli_query($this->conexao->getCon(), $sql);


        if (mysqli_num_rows($executa) > 0) {
            while ($row = mysqli_fetch_assoc($executa)) {
                $return = $row;
            }

            return $return;
        } else {
            return false;
        }
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM usuario WHERE id = '$id'";

        return mysqli_query($this->conexao->getCon(), $sql);
    }

    public function login($email, $senha) {
        $senha = md5($senha);
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

        $executa = mysqli_query($this->conexao->getCon(), $sql);

        if(mysqli_num_rows($executa) > 0) {
            session_start();
            while ($row = mysqli_fetch_assoc($executa)) {
                $_SESSION["nome"] = $row['nome'];
            }
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            header('location: Cadastro.php');
            exit();

        }
        header('location:index.php?erro=senha');
        return false;

    }

    public function logout()
    {

        session_start();

        session_destroy();

        //setcookie("login" , "" , time()-60*5);
        header("Location:index.php?success=logout");
        exit();
    }


}