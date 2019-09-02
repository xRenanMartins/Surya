<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 30/08/2019
 * Time: 22:12
 */


  class Conexao {
      private $usuario = 'root';
      private $senha = '';
      private $caminho = 'localhost';
      private $banco = 'surya';
      private $con;

      public function __construct() {
          $this->con = mysqli_connect($this->caminho, $this->usuario, $this->senha) or die("Conexão com o banco de dados falhou!" . mysqli_error($this->con));

          mysqli_select_db($this->con, $this->banco) or die("Conexão com o banco de dados falhou!" . mysqli_error($this->con));

      }

      public function getCon() {
          return $this->con;
      }
  }