<?php

namespace models;

/**
 * Classe Model de Prospect
 * @author Luiz Felipe Kraus
 */

class Prospect {
     /**
    * Login do codigo
    * @var int
    */
    private $codigo;
     /**
    * Login do nome
    * @var string
    */
    public $nome;
     /**
    * Login do facebook
    * @var string
    */
    public $facebook;
     /**
    * Login do email
    * @var string
    */
    public $email;
     /**
    * Login do celular
    * @var string
    */
    public $celular;
     /**
    * Login do whatsapp
    * @var string
    */
    public $whatsapp;
     /**
    * Carrega os atributos da classe Prospect
    * @param int $codigo codigo do Prospect
    * @param string $nome Nome do Prospect
    * @param string $email E-mail do Prospect
    * @param string $celular Celular do Prospect
    * @param string $facebook Facebook do Prospect
    * @param string $whatsapp Whatsapp do Prospect
    * @return void
    */
    public function addProspect($codigo, $nome, $email,
    $celular, $facebook, $whatsapp)
    {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
        $this->facebook = $facebook;
        $this->whatsapp - $whatsapp;
    }
}
?>