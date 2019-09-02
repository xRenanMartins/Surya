<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 30/08/2019
 * Time: 22:19
 */

require_once "UsuarioDao.php";

class Usuario
{
    protected $UsuarioDao;

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $acesso;
    private $estado;
    private $cidade;
    private $senha;

    /**
     * Usuario constructor.
     * @param $id
     * @param $nome
     * @param $email
     * @param $telefone
     * @param $acesso
     * @param $estado
     * @param $cidade
     */
    public function __construct($id = null, $nome = null, $email = null, $telefone = null, $acesso = null, $estado = null, $cidade = null, $senha = null)
    {
        $this->UsuarioDao = new UsuarioDao();
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->acesso = $acesso;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->senha = md5($senha);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getAcesso()
    {
        return $this->acesso;
    }

    /**
     * @param mixed $acesso
     */
    public function setAcesso($acesso)
    {
        $this->acesso = $acesso;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }


    public function cadastrar()
    {
        $vars = get_object_vars($this);
        unset($vars['UsuarioDao'], $vars['id']);
        $values = "'" . implode("','", array_values($vars)) . "'";
        return $this->UsuarioDao->cadastrar($values);
    }

    public function alterar()
    {
        $vars = get_object_vars($this);
        $update = 'UPDATE usuario SET ';
        unset($vars['UsuarioDao']);

        foreach($vars as $col => $value){
            if ($col != 'id') {
                $update .= sprintf("`%s`='%s', ", $col, mysqli_real_escape_string($this->UsuarioDao->conexao->getCon(), $value));
            }
        }
        $update = substr($update, 0, -2);
        $update .= " WHERE id = {$vars['id']}";
        return $this->UsuarioDao->alterar($update);
    }

    public function deletar()
    {
        return $this->UsuarioDao->deletar($this->id);
    }

    public function procuraId()
    {
        return $this->UsuarioDao->procuraId($this->id);
    }

    public function listar()
    {
        return $this->UsuarioDao->listar();
    }

    public function login()
    {
        return $this->UsuarioDao->login($this->email, $this->senha);
    }

    public function logout()
    {
        return $this->UsuarioDao->logout();
    }

}